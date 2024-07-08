<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Complaint;
use App\Models\Course;
use App\Models\Feedback;
use App\Models\Room;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function welcome_home(){
        return view('welcome');
    }

    public function view_dashboard(){
        return view('dashboard');
    }

    public function go_book_hostel(){
        return view('book-hostel',[
            'bookings' => Booking::all(),
            'rooms' => Room::all(),
        ]);
    }

    public function show_room_details(){
        return view('room-details',[
            'bookings' => Booking::all(),
        ]);
    }

    public function send_complaint(){
        return view('send-complaint',[
            'complaints' => Complaint::latest()->paginate(8),
        ]);
    }

    public function feedbacks(){
        return view('feedbacks',[
            'bookings' => Booking::all(),
        ]);
    }

    public function register_new(){
        return view('register');
    }

    public function store_students(Request $request){
        $studentData=$request->validate([
            'first_name' => 'required',
            'reg_number' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        try{
            $student=Student::create($studentData);
            Auth::guard('student')->login($student);
            return redirect('/dashboard')->with('success_message','Registered and logged in successfully!');
        }catch(\Throwable $e){
            $e->getMessage();
        }
    }

    public function go_my_profile(){
        return view('my-profile');
    }

    public function authentication(Request $request){
        $loginCredentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        try{
            if(Auth::guard('student')->attempt($loginCredentials)){
                $request->session()->regenerateToken();
                return redirect('/dashboard')->with('success_login','Student Logged in successfully');
            }else if(Auth::guard('web')->attempt($loginCredentials)){
                $request->session()->regenerateToken();
                return redirect('/admin/dashboard')->with('admin_flash_message','Admin logged in successfully!');
            }
            else{
                return redirect()->back()->with('error_message','Ooops! incorrect username or password...');
            }
        }catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function edit_my_profile(Request $request, Student $student){
        $studentProfile = $request->validate([
            'middle_name' => 'nullable',
            'last_name' => 'nullable',
            'gender' => 'nullable',
            'course' => 'nullable',
            'level' => 'nullable',
            'profile' => 'nullable',
            'contact_number' => 'nullable',
            'email_address' => 'nullable',
            'emergency_contact' => 'nullable',
            'guardian_name' => 'nullable',
            'guardian_contact' => 'nullable',
            'guardian_relation' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'pincode' => 'nullable',
        ]);

        if($request->hasFile('profile')){
            $studentProfile['profile'] = $request->file('profile')->store('profiles','public');
        }

        try{
            $student->update($studentProfile);
            return redirect()->back()->with('message_updated','Profile updated sucessfully');
        }catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function change_password(Request $request, Student $student){
        $passw_user=$request->validate([
            'username' => 'nullable',
            'password' => 'nullable',
        ]);

        try{
            $student->update($passw_user);
            return redirect()->back()->with('success_pass_user_updated','Data updated successfully');
        }catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function logout(Request $request){
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('logout_flash_message','Logged out successfully...');
    }

    public function store_application(Request $request){
        $hostelApplicationRecords = $request->validate([
            'block_name' => 'required',
            'room_number' => 'required',
            'stay_from' => 'required',
            'course' => 'required',
            'level' => 'required',
            'reg_number' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'contact_number' => 'required',
            'emergency_contact' => 'required',
            'status'=> 'nullable',
        ]);

        try{
            $success = Booking::create($hostelApplicationRecords);

            if($success){
                return redirect()->back()->with('room_booked_message','Booking completed successfully');
            }else{
                return redirect()->back()->with('booking_error','Oops! Failed to complete booking');
            }
        }catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function send_complaints(Request $request){
        $complaintsData=$request->validate([
            'complaint_type' => 'required',
            'description' => 'required',
            'file_complaint' => 'nullable',
        ]);

        try{
            if($request->hasFile('file_complaint')){
                $complaintsData['file_complaint'] = $request->file('file_complaint')->store('complaints','public');
            }

            Complaint::create($complaintsData);

            return redirect()->back()->with('complaint_sent','Complaint send successfully');
        }catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function view_complaints(){
        return view('view-complaints',[
            'complaints' => Complaint::latest()->paginate(2),
        ]);
    }




    //ADMIN
    public function admin_dashboard(){
        return view('admin.dashboard',[
            'students' =>Student::all(),
            'courses' => Course::all(),
            'rooms' => Room::all(),
        ]);
    }

    public function courses_page(){
        return view('admin.courses');
    }

    public function store_courses(Request $request){
        $courseDetails = $request->validate([
            'course_code' => 'required',
            'short_form_name' => 'required',
            'long_form_name' => 'required',
        ]);

        try{
            Course::create($courseDetails);
            return redirect()->back()->with('course_stored','Course registered successfully');
        }catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function show_view_courses(){
        return view('admin.view-courses',[
            'courses' => Course::paginate(8),
        ]);
    }

    public function delete_course(Request $request,Course $course){
        try{
            $course->delete();
            return redirect()->back()->with('deleted_course','Course deleted successfully');
        }catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function edit_course(Request $request, Course $course){
        $modifiedData=$request->validate([
            'course_code' => 'required',
            'short_form_name' => 'required',
            'long_form_name' => 'required',
        ]);

        try{
            $course->update($modifiedData);
            return redirect()->back()->with('course_edited','Course edited successfully!');
        }catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function show_profile(){
        return view('admin.admin-profile');
    }

    public function edit_admin_profile(Request $request, User $user){
        $userDetails = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'profile' => 'required',
        ]);

        try{
            if($request->hasFile('profile')){
                $userDetails['profile'] = $request->file('profile')->store('user_profiles','public');
            }

            $user->update($userDetails);

            return redirect()->back()->with('user_updated','Profile updated successfully!');
        }catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function show_rooms(){
        return view('admin.rooms');
    }

    public function store_rooms(Request $request){
        $roomsDetails = $request->validate([
            'seater' => 'required',
            'block_name' => 'required',
            'room_number' => 'required',
        ]);

        try{
            Room::create($roomsDetails);
            return redirect()->back()->with('room_created','Room added successfully!');
        }catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function view_rooms(){
        return view('admin.view-rooms',[
            'rooms'=>Room::paginate(8),
        ]);
    }

    public function edete_room(Request $request, Room $room){
        $roomDetails = $request->validate([
            'seater' => 'required',
            'block_name' => 'required',
            'room_number' => 'required',
        ]);

        try{
            $room->update($roomDetails);
            return redirect()->back()->with('room_updated','Room updated successfully!');
        }catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function delete_room(Request $request, Room $room){
        try{
            $room->delete();
            return redirect()->back()->with('message_deleted','Room deleted sucessfully!');
        }catch(\Throwable $e){
            return $e->getMessage();
        }
    }

    public function view_students(){
        $rooms = DB::table('bookings')
                ->select('room_number', DB::raw('count(reg_number) as reg_count'))
                ->groupBy('room_number')
                ->get();

                foreach ($rooms as $room) {
                    if ($room->reg_count >= 4) {
                        // Update status to 'Full'
                        Booking::where('room_number', $room->room_number)->update(['status' => 'Full']);
                    } else {
                        // Update status to the count of registrations
                        Booking::where('room_number', $room->room_number)->update(['status' => $room->reg_count]);
                    }
                }

       // $csCount = DB::table('bookings')->where('room_number', '4')->count();
        return view('admin.view-students',[
            'students'=>Student::all(),
            'bookings' => Booking::latest()->paginate(8),
        ]/*,['csCount' => $csCount]*/);
    }

    public function view_feedbcaks(){
        return view('admin.feedbacks',[
            'feedback' => Feedback::latest()->paginate(5),
        ]);
    }

    public function show_complaints(){
        return view('admin.complaints',[
            'complaints' => Complaint::latest()->paginate(8),
        ]);
    }

    public function single_complaint($id){
        return view('admin.view-action',[
            'complain' => Complaint::find($id),
        ]);
    }

    public function edit_complain(Request $request, Complaint $complain){
        $complainData=$request->validate([
            'status' => 'required',
            'responses' => 'required',
        ]);

        $complain->update($complainData);
        return redirect()->back();
    }

    public function store_feedbacks(Request $request){
        $feedbackData=$request->validate([
            'access_warden' => 'required',
            'redressal_problem' => 'required',
            'room_condition' => 'required',
            'rating' => 'required',
            'message' => 'nullable',
        ]);

        Feedback::create($feedbackData);
        return redirect()->back()->with('feedback_sent','Feedback sent successfully!');
    }
}
