<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class courseController extends Controller
{
    public function courseUpload(Request $req){
        $req->validate([
        'c_title' => 'required',
        'c_category' => 'required',
        'c_vidFile' => 'required|mimes:mp4,MOV,WMV,AVI,AVCHD,MKV|max:500000',
        'c_thumbFile' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
        'c_docfile' => 'mimes:csv,txt,xlx,xlsx,doc,docx,zip,xls,pdf|max:2048',
        'c_description' => 'required'
        ]);
        $courseModel = new Course;
        // $user = Auth::user();
       
            $courseModel->c_title = $req->c_title;
            $courseModel->c_category = $req->c_category;
            $courseModel->c_description = $req->c_description;

            $fileName = time().'_'.$req->c_vidFile->getClientOriginalName();
            $filePath = $req->file('c_vidFile')->storeAs('vids_uploads', $fileName, 'public');
            $courseModel->c_vid_file_name = time().'_'.$req->c_vidFile->getClientOriginalName();
            $courseModel->c_vid_file_path = '/storage/' . $filePath;

            $fileName = time().'_'.$req->c_thumbFile->getClientOriginalName();
            $filePath = $req->file('c_thumbFile')->storeAs('thumbs_uploads', $fileName, 'public');
            $courseModel->c_thumb_file_name = time().'_'.$req->c_thumbFile->getClientOriginalName();
            $courseModel->c_thumb_file_path = '/storage/' . $filePath;

            $fileName = time().'_'.$req->c_docfile->getClientOriginalName();
            $filePath = $req->file('c_docfile')->storeAs('doc_uploads', $fileName, 'public');
            $courseModel->c_adoc_file_name = time().'_'.$req->c_docfile->getClientOriginalName();
            $courseModel->c_adoc_file_path = '/storage/' . $filePath;
            $courseModel->uploaded_by = '--';

            $courseModel->save();
            return response()->json(['success'=>'Successfully']);
            // return redirect()->back()->with('File uploaded successfully');                 
   }

   public function fileDownload($file){
    //return response()->download(storage_path('app/public/vids_uploads/1660245261_live search engine.mp4'));
    return response()->download(storage_path('app/public/vids_uploads/'. $file));
   }

   public function getRecords(Request $request){
    $filedata = Course::all();

    return view('Instructor_module/home_page', [
       'filedata' => $filedata
    ]);
    
   }

   public function getRecordsMC(Request $request){

    // $filedata = File::where('uploaded_by', '=', auth()->user()->username)->get();
    $coursedata = Course::all();
    
    if ($request->ajax()) {
        return response()->json([
            'coursedata'=>$coursedata,
        ]);
    }

    return view('/manage_course', [
       'coursedata' => $coursedata
    ]);

   }

   public function courseView($id)
    {
    	$courseView = Course::find($id);

	    return response()->json([
	      'data' => $courseView
	    ]);
    }

   public function updateCourse($id)
    {
    	$courseEdit = Course::find($id);

	    return response()->json([
	      'data' => $courseEdit
	    ]);
    }

    public function deleteCourse($id)
    {
    	$courseDel = Course::find($id);

	    return response()->json([
	      'data' => $courseDel
	    ]);
    }

    public function editCourse(Request $req, $id)
    {
        $validate = Validator::make($req->all(),[
            'c_title' => 'required',
            'c_category' => 'required',
            'c_description' => 'required'
            ]);

        $courseId = Course::find($id);
        // $user = Auth::user();
        if($courseId) {
            $courseId->c_title = $req->c_title;
            $courseId->c_category = $req->c_category;
            $courseId->c_description = $req->c_description;
            // $fileId->uploaded_by = auth()->user()->username;
            
            if($req->hasFile('c_vidFile'))
            {
            $pathVideo = storage_path('app/public/vids_uploads/'. $courseId->c_vid_file_name);
            if(Course::exists($pathVideo)){
                Course::destroy($pathVideo);
            }
            $fileName = time().'_'.$req->c_vidFile->getClientOriginalName();
            $filePath = $req->file('c_vidFile')->storeAs('vids_uploads', $fileName, 'public');
            $courseId->c_vid_file_name = time().'_'.$req->c_vidFile->getClientOriginalName();
            $courseId->c_vid_file_path = '/storage/' . $filePath;
            }

            if($req->hasFile('c_thumbFile'))
            {
            $pathThumb = storage_path('app/public/thumbs_uploads/'. $courseId->c_thumb_file_name);
            if(Course::exists($pathThumb)){
                Course::destroy($pathThumb);
            }
            $fileName = time().'_'.$req->c_thumbFile->getClientOriginalName();
            $filePath = $req->file('c_thumbFile')->storeAs('thumbs_uploads', $fileName, 'public');
            $courseId->c_thumb_file_name = time().'_'.$req->c_thumbFile->getClientOriginalName();
            $courseId->c_thumb_file_path = '/storage/' . $filePath;
            }

            if($req->hasFile('c_docfile'))
            {
            $pathDoc = storage_path('app/public/doc_uploads/'. $courseId->c_adoc_file_name);
            if(Course::exists($pathDoc)){
                Course::destroy($pathDoc);
            }
            $fileName = time().'_'.$req->c_docfile->getClientOriginalName();
            $filePath = $req->file('c_docfile')->storeAs('doc_uploads', $fileName, 'public');
            $courseId->c_adoc_file_name = time().'_'.$req->c_docfile->getClientOriginalName();
            $courseId->c_adoc_file_path = '/storage/' . $filePath;
            }
            
            $courseId->save();
            return response()->json(['success'=>200,
            'message'=>'Course Updated Successfully']);
        }
        else{
            return response()->json(['success'=>200,
            'message'=>'ID Not Found']);
        }
            

}

public function destroyCourse($id)
    {
        Course::find($id)->delete();
        return response()->json(['success'=>200,
            'message'=>'Course Deleted Successfully']);
    }
}
