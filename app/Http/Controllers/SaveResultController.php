<?php

namespace App\Http\Controllers;

use App\Models\Managment;
use App\Models\SaveResult;
use Illuminate\Http\Request;
use \Mpdf\Mpdf as PDF;
use Illuminate\Support\Facades\Storage;


class SaveResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = SaveResult::all();
        return view('cms.Results', ['calcResults' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate(
        //     [
        //         'job_number' => 'required|unique:employees',
        //         'employee_name' => 'required',
        //         // 'date_of_hiring' => 'required',
        //         'department' => 'required',
        //         'circle' => 'required',
        //         'hospital' => 'required',
        //         'role' => 'required',
        //         'mobile_number' => 'required',
        //     ],
        //     [
        //         'job_number.required' => 'الرجاء إدخال رقم الوظيفة',

        //         'employee_name.required' => 'الرجاء إدخال اسم الموظف',
        //         // 'date_of_hiring.required' => 'الرجاء إدخال تاريخ التعيين',
        //         'department.required' => 'الرجاء اختيار القسم',
        //         'circle.required' => 'الرجاء اختيار الدائرة',
        //         'hospital.required' => 'الرجاء ختيار المستشفى',
        //         'role.required' => 'الرجاء اختيار الدور',
        //         'mobile_number.required' => 'الرجاء إدخال رقم الجوال',
        //     ]
        // );

        $saveresult = new SaveResult();
        if ($request->choice_id_global == 1) {
            $saveresult->CLASS_TYPE = $request->imported_data;
        } elseif ($request->choice_id_global == 2) {
            $saveresult->JOBTITLE_ID = $request->imported_data;
        }
        $saveresult->DEPARTMENT_ID = $request->department_id;
        $saveresult->KEY_VALUE = $request->key_value;
        $saveresult->CALC_TYPE_ID = $request->calc_type_id;
        $saveresult->EMP_COUNT = $request->emp_count;
        $saveresult->RESULT_CALC = $request->result;
        $saveresult->NEED_EMP = $request->need;
        $saveresult->DTL_REUSLT = $request->details;
        // dd($saveresult);
        $saveresult->save();

        // session()->flash('success', 'تم حفظ البيانات بنجاح');
        // return back()->with('success', 'تم حفظ البيانات بنجاح');
        return true;

        // return redirect()->back()->with('success', 'تم حفظ البيانات بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $department = SaveResult::findOrFail($id);
        // return response()->view('cms.departments.edit', ['department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $isDestroyed = SaveResult::destroy($id);
        return response()->json(['message' => $isDestroyed ? 'تم حذف نتيجة الحساب بنجاح' : 'حدث خطأ أثناء حذف النتيجة '], $isDestroyed ? 200 : 400);
    }



    public function getRowData(Request $request)
    {
        // dd($request->all());
        $data = SaveResult::with(['EmployeeRole', 'DepartmentName', 'CalculateType', 'Classification'])->findOrFail($request->id);
        $str = $this->getId($data->department_id);
        return response()->json(['data' => $data, 'result' => $str]);
        // dd(response()->json(['data' => $data]));
    }

    public function getId($id)
    {
        $str = $this->getParent($id);
        return $str;
    }
    function getParent($id)
    {
        $str = '';
        $row = Managment::where('tb_managment_code', $id)->first();
        if ($row) {
            $str .= $row->tb_managment_name;
            if ($row->tb_managment_parent) {
                $str .= '/' . $this->getParent($row->tb_managment_parent);
            }
        }
        return $str;
    }
    //results without borders

    // public function resultPdf()
    // {
    //     // Setup a filename
    //     $documentFileName = "Results.pdf";

    //     // Create the mPDF document
    //     $document = new PDF([
    //         'mode' => 'utf-8',
    //         'format' => 'A4',
    //         'margin_header' => '3',
    //         'margin_top' => '20',
    //         'margin_bottom' => '20',
    //         'margin_footer' => '2',
    //     ]);

    //     // Set the font configuration for Arabic support
    //     $document->autoScriptToLang = true;
    //     $document->baseScript = 1;
    //     $document->autoLangToFont = true;
    //     // Set some header information for output
    //     $header = [
    //         'Content-Type' => 'application/pdf',
    //         'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
    //     ];

    //     // Set the RTL configuration
    //     $document->SetDirectionality('rtl');

    //     // Start the table
    //     $document->WriteHTML('<table ');

    //     // Add the table header
    //     $document->WriteHTML('<thead>');
    //     $document->WriteHTML('<tr>');
    //     $document->WriteHTML('<th>المسمى الوظيفي</th>');
    //     $document->WriteHTML('<th>الفئة الوظيفية</th>');
    //     $document->WriteHTML('<th>القسم</th>');
    //     $document->WriteHTML('<th>قيمة المفتاح</th>');
    //     $document->WriteHTML('<th>نوع الاحتساب</th>');
    //     $document->WriteHTML('<th>عدد الموظفين الحالي</th>');
    //     $document->WriteHTML('<th>العدد المطلوب</th>');
    //     $document->WriteHTML('<th>الاحتياج</th>');
    //     $document->WriteHTML('<th>التفاصيل</th>');
    //     $document->WriteHTML('<th>تاريخ الادخال</th>');
    //     $document->WriteHTML('</tr>');
    //     $document->WriteHTML('</thead>');


    //     // Fetch and iterate over your model data
    //     $modelData = SaveResult::all();
    //     $document->WriteHTML('<tbody>');

    //     foreach ($modelData as $data) {

    //         // Add a table row with the model data
    //         $document->WriteHTML('<tr>');
    //         $document->WriteHTML('<td>');
    //         if (!empty($data->employeerole)) {
    //             $document->WriteHTML($data->employeerole->jobtitle_name_ar);
    //         }
    //         $document->WriteHTML('</td>');

    //         $document->WriteHTML('<td>');
    //         if (!empty($data->classification)) {
    //             $document->WriteHTML($data->classification->job_classification_name);
    //         }
    //         $document->WriteHTML('</td>');

    //         $document->WriteHTML('<td>');
    //         if (!empty($data->departmentname)) {
    //             $document->WriteHTML($data->departmentname->tb_managment_name);
    //         }
    //         $document->WriteHTML('</td>');

    //         $document->WriteHTML('<td>' . $data->key_value . '</td>');

    //         if (!is_null($data->calc_type_id) && !is_null($data->calculatetype)) {
    //             $document->WriteHTML('<td>' . $data->calculatetype->const_name . '</td>');
    //         }

    //         $document->WriteHTML('<td>' . $data->emp_count . '</td>');
    //         $document->WriteHTML('<td>' . $data->result_calc . '</td>');
    //         $document->WriteHTML('<td>' . $data->need_emp . '</td>');
    //         $document->WriteHTML('<td>' . $data->dtl_reuslt . '</td>');
    //         $document->WriteHTML('<td>' . $data->created_at . '</td>');
    //         $document->WriteHTML('</tr>');
    //     }
    //     $document->WriteHTML('</tbody>');
    //     // End the table
    //     $document->WriteHTML('</table>');

    //     // Save the PDF to your public storage
    //     Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "S"));

    //     // Download the file with the given header information
    //     return Storage::disk('public')->download($documentFileName, 'Request', $header);
    // }

    //result with borders
    public function resultPdf()
    {
        // Setup a filename
        $documentFileName = "Results.pdf";

        // Create the mPDF document
        $document = new PDF([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '2',
        ]);

        // Set the font configuration for Arabic support
        $document->autoScriptToLang = true;
        $document->baseScript = 1;
        $document->autoLangToFont = true;

        // Set some header information for output
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
        ];

        // Set the RTL configuration
        $document->SetDirectionality('rtl');

        // Start the table
        $document->WriteHTML('<table style="border-collapse: collapse; width: 100%; border: 1px solid #000;">');

        // Add the table header
        $document->WriteHTML('<thead>');
        $document->WriteHTML('<tr>');
        $document->WriteHTML('<th style="border: 1px solid #000;">المسمى الوظيفي</th>');
        $document->WriteHTML('<th style="border: 1px solid #000;">الفئة الوظيفية</th>');
        $document->WriteHTML('<th style="border: 1px solid #000;">القسم</th>');
        $document->WriteHTML('<th style="border: 1px solid #000;">قيمة المفتاح</th>');
        $document->WriteHTML('<th style="border: 1px solid #000;">نوع الاحتساب</th>');
        $document->WriteHTML('<th style="border: 1px solid #000;">عدد الموظفين الحالي</th>');
        $document->WriteHTML('<th style="border: 1px solid #000;">العدد المطلوب</th>');
        $document->WriteHTML('<th style="border: 1px solid #000;">الاحتياج</th>');
        $document->WriteHTML('<th style="border: 1px solid #000;">التفاصيل</th>');
        $document->WriteHTML('<th style="border: 1px solid #000;">تاريخ الادخال</th>');
        $document->WriteHTML('</tr>');
        $document->WriteHTML('</thead>');


        // Fetch and iterate over your model data
        $modelData = SaveResult::all();
        $document->WriteHTML('<tbody>');

        foreach ($modelData as $data) {

            // Add a table row with the model data
            $document->WriteHTML('<tr>');
            $document->WriteHTML('<td style="border: 1px solid #000;">');
            if (!empty($data->employeerole)) {
                $document->WriteHTML($data->employeerole->jobtitle_name_ar);
            }
            $document->WriteHTML('</td>');

            $document->WriteHTML('<td style="border: 1px solid #000;">');
            if (!empty($data->classification)) {
                $document->WriteHTML($data->classification->job_classification_name);
            }
            $document->WriteHTML('</td>');

            $document->WriteHTML('<td style="border: 1px solid #000;">');
            if (!empty($data->departmentname)) {
                $document->WriteHTML($data->departmentname->tb_managment_name);
            }
            $document->WriteHTML('</td>');

            $document->WriteHTML('<td style="border: 1px solid #000;">' . $data->key_value . '</td>');

            if (!is_null($data->calc_type_id) && !is_null($data->calculatetype)) {
                $document->WriteHTML('<td style="border: 1px solid #000;">' . $data->calculatetype->const_name . '</td>');
            }

            $document->WriteHTML('<td style="border: 1px solid #000;">' . $data->emp_count . '</td>');
            $document->WriteHTML('<td style="border: 1px solid #000;">' . $data->result_calc . '</td>');
            $document->WriteHTML('<td style="border: 1px solid #000;">' . $data->need_emp . '</td>');
            $document->WriteHTML('<td style="border: 1px solid #000;">' . $data->dtl_reuslt . '</td>');
            $document->WriteHTML('<td style="border: 1px solid #000;">' . $data->created_at . '</td>');
            $document->WriteHTML('</tr>');
        }
        $document->WriteHTML('</tbody>');
        // End the table
        $document->WriteHTML('</table>');

        // Save the PDF to your public storage
        Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "S"));

        // Download the file with the given header information
        return Storage::disk('public')->download($documentFileName, 'Request', $header);
    }
}
