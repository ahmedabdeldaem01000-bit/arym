@extends('layout.app')

@section('title', 'دفعات الإجازة')
@push('link-style')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dashboard/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/index.css') }}">

@endpush
@section('content' )
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" >
                     
                       
                    
                            <!-- جدول الجنود -->
                            <div id="" class="allDivCards" style="width: 100%;">

                                @foreach ($soldiers as $soldier)
                                    <div class="solderCard"  >
                                        <div class="top-static-data">
                                            <img src="{{ asset('pic/LOGO2.png') }}" alt="" width="20%" height="20%">
                                            <span class="right-title w-auto">وزارة الداخلية
                                             <br>
                                                             مديرية امن الاسماعليه
                                                             <br>
                                                              ادارة قوات
                                                               الامن
                                            </span>
                                        </div>
                                        <ul class="ul-number-own">
                                            <li>(✔)دوريه</li>
                                            <li>()فرديه</li>
                                            <li>()فسحه</li>
                                            <li>()ماموريه </li>
                                        </ul>
                                        <ul class="ul-number-tow">

                                            <li> الاسم :{{ $soldier->name }}</li>
                                            <li>السرية:{{ $soldier->regiment->name }}</li>

                                            @foreach ($soldier->leaves as $leave)
                                                <li>
                                                    تاريخ الخروج :{{ $leave->start_date }}
                                                </li>
                                                <li>

                                                    تاريخ العوده: {{ $leave->end_date }}
                                                </li>
                                            @endforeach

                                        </ul>
<ul class="ul-number-three">
    <li>ح ( <span class="span_span"></span> ) بند قيام </li>
    <li>  (<span class="span_span"></span> :<span class="span_span"></span>     )ساعه قيام  </li>
</ul>

<div class="static-word">
    <p>
    يصرح له بارتداء الملابس المدنية لعدم التعرض له <br>

تنبيه هام

    </p>
    <p class="static-word">
    يحظر تجاوز الطريق السريع امام المعسكر و يتم عبور الطريق من أعلى كوبرى المشاة فقط تجنبا للحوادث و منعا للتعرض للجزاء الاداري
    </p>
</div>


<div class="ul-number-for">
   
    <ul style=" margin-right: 3rem;">
        <li style="margin-right: 1rem;">مدير الادارة</li>
 <li>عقيد /</li>
         <li style="margin-right: 1rem;">" <strong>احمدالباز</strong>  "</li>
    </ul>
     <ul>
        <li >رئيس قسم الشؤون</li>
 <li>رائد /</li> 
         <li>" <strong> محمد عبدالوهاب </strong>   "</li>
    </ul>
</div>
                                        <div>



                                        </div>
                                    </div>
                                @endforeach


                            </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts-database')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset("dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dashboard/dist/js/demo.js') }}"></script>
    <script>
function printDiv() {
  var printContents = document.getElementById("printSection").innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
}
</script>
    <script>
        
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $(document).ready(function () {
            // Select/Deselect all checkboxes
            $('#select-all').change(function () {
                var isChecked = $(this).prop('checked');
                $('.select-row').prop('checked', isChecked);
            });

            // If any individual checkbox is unchecked, uncheck the "Select All"
            $('.select-row').change(function () {
                var allChecked = $('.select-row').length === $('.select-row:checked').length;
                $('#select-all').prop('checked', allChecked);
            });
        });
    </script>
@endpush