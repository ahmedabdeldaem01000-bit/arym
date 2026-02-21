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
 
@endpush
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card_header_edit">
               <h3 class="card-title" style="font-weight: bold; font-size: 28px;">بيانات الجنود في السرية: {{ $batchname->name }}</h3>
                        <style>
                            .card_header_edit{
                               text-align: right;
                            }
                        </style>
                        <a href="{{ route('soldiers.create') }}" class="btn btn-success mb-3">➕ إضافة جندي جديد</a>
                    </div>
                    <div class="card-body">
                        <!-- نموذج إرسال إجازة جماعية -->
                        <form action="{{ route('leaves.store') }}" method="POST">
                        @csrf

                        <!-- حقل لتحديد تاريخ بداية الإجازة -->
                        <label for="leave_start_date">تاريخ بداية الإجازة:</label>
                        <input type="date" name="leave_start_date" required>

                        <!-- حقل لتحديد تاريخ نهاية الإجازة -->
                        <label for="leave_end_date">نهاية الإجازة:</label>
                        <input type="date" name="leave_end_date" required>

                        <!-- إضافة الجنود المختارين كـ hidden inputs -->
                        @foreach ($soldiers as $soldier)
                            <input type="hidden" name="soldiers[]" value="{{ $soldier->id }}">
                        @endforeach

                        <!-- زر إرسال الإجازة -->
                        <button type="submit" class="btn btn-primary mt-3">إرسال إجازة جماعية</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <!-- جدول الجنود -->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>الاسم</th>
                                    <th>رقم الشرطة</th>
                                    <th>الرقم القومي</th>
                                    <th>تاريخ التجنيد</th>
                                    <th>التسريح من التجنيد</th>
                                    <th>المحافظة</th>
                                    <th>رقم الهاتف</th>
                                    <th>الحالة الطبية</th>
                                    <th>الدفع</th>
                                    <th>الوظيفة</th>
                                    <th>ملاحظات</th>
                                    <th>حالة خاصة</th>
                                     <th>أيام العمل</th>
                                    <th>حالة الإجازة</th>
                                    <th>عمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($soldiers as $soldier)
                                <tr>
                                    <td>{{ $soldier->id }}</td>
                                    <td>{{ $soldier->name }}</td>
                                    <td>{{ $soldier->police_number }}</td>
                                    <td>{{ $soldier->national_id }}</td>
                                    <td>{{ $soldier->date_of_conscription }}</td>
                                    <td>{{ $soldier->discharge_from_conscription }}</td>
                                    <td>{{ $soldier->governorate }}</td>
                                    <td>{{ $soldier->phone_number }}</td>
                                    <td>{{ $soldier->medical_condition }}</td>
                                    <td>{{ $soldier->batch?->name }}</td>
                                    <td>{{ $soldier->job->name }}</td>
                                    <td>{{ $soldier->notes }}</td>
                                    <td>{{ $soldier->special_case }}</td>
                                     <td>{{ $soldier->work_days }}</td>
<td>
  <form action="{{ route('soldiers.statue', $soldier->id) }}" method="POST">
      @csrf

      <div class="d-flex align-items-center gap-2">
          <select name="status" class="form-select form-select-sm" style="width:130px;">
              <option value="">-- اختر الحالة --</option>
              <option value="working" {{ $soldier->status == 'working' ? 'selected' : '' }}>يعمل</option>
              <option value="leave" {{ $soldier->status == 'leave' ? 'selected' : '' }}>في إجازة</option>
          </select>

          <button type="submit" class="btn btn-sm btn-primary">
              💾 حفظ
          </button>
      </div>
  </form>
</td>
                                     <td>
                                        <a href="{{ route('soldiers.edit', $soldier->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                                        <a href="{{ route('soldiers.destroy', $soldier->id) }}" class="btn btn-danger btn-sm">حذف</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
