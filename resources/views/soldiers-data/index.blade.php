@extends('layout.app')

@section('title', 'بيانات الجنود')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="shadow-sm card">

      <!-- العنوان وشريط الأدوات -->
      <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0 card-title">📋 بيانات الجنود</h3>
        <div>
       
        </div>
      </div>

      <div class="card-body">
 

        <!-- جدول البيانات -->
        <div class="table-responsive">
          <table id="soldiersTable" class="table text-center align-middle table-bordered table-striped">
            <thead class="table-light">
              <tr>
                <th><input type="checkbox" id="selectAll"></th>
                <th>#</th>
                <th>الاسم</th>
                <th>الصورة</th>
                <th>رقم الشرطة</th>
                <th>الرقم القومي</th>
                <th>تاريخ التجنيد</th>
                <th>التسريح</th>
                <th>المحافظة</th>
                <th>الهاتف</th>
                <th>السرية</th>
                <th>الحالة الطبية</th>
                <th>دفع الاجازة</th>
                <th>الجهة</th>
                <th>الوظيفة</th>
           
                <th>ملاحظات</th>
                <th>الحالة</th>
                <th>العمليات</th>
                <th>حالة خاصة</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($soldiers as $soldier)
              <tr>
                <td><input type="checkbox" class="row-checkbox" value="{{ $soldier->id }}"></td>
                <td>{{ $soldier->id }}</td>
                <td>{{ $soldier->name }}</td>
                <td>
                  @if($soldier->image)
                  <img src="{{ asset('storage/' . $soldier->image) }}" width="70" class="rounded shadow-sm" alt="صورة">
                  @else
                  <span class="text-muted">لا توجد صورة</span>
                  @endif
                </td>
                <td>{{ $soldier->police_number }}</td>
                <td>{{ $soldier->national_id }}</td>
                <td>{{ $soldier->date_of_conscription }}</td>
                <td>{{ $soldier->discharge_from_conscription }}</td>
                <td>{{ $soldier->governorate }}</td>
                <td>{{ $soldier->phone_number }}</td>
                <td>{{ $soldier->regiment->name ?? 'غير محدد' }}</td>
                <td>{{ $soldier->medical_condition }}</td>
                <td>{{ $soldier->batch->name }}</td>
               <td>{{  $soldier->authority->name ?? 'غير محدد' }}</td> 
                <td>{{ $soldier->job->name ?? 'غير محدد' }}</td>
                <td>{{ $soldier->notes }}</td>
<td>
  <form action="{{ route('soldiers.statue', $soldier->id) }}" method="POST">
      @csrf

      <div class="gap-2 d-flex align-items-center">
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
                  <a href="{{ route('soldiers.edit', $soldier->id) }}" class="btn btn-sm btn-warning me-1">✏️ تعديل</a>
                  <form action="{{ route('soldiers.destroy', $soldier->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">🗑️ حذف</button>
                  </form>
                </td>
                <td>{{ $soldier->special_case ?? '-' }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

 
@endsection

@push('scripts-database')
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"></script>

<script>
$(function() {

  // تحديد الكل
  $('#selectAll').on('click', function() {
    $('.row-checkbox').prop('checked', this.checked);
  });

  // DataTables
  const table = $("#soldiersTable").DataTable({
    responsive: true,
    pageLength: 10,
    autoWidth: false,
    scrollX: true,
    language: { url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json" },
    // dom: '<"top"Bfrtip><"bottom"lip>',
    buttons: [
      { extend: 'colvis', text: '🧩 الأعمدة' },
      { extend: 'copy', text: '📋 نسخ' },
      { extend: 'excel', text: '📥 Excel' },
      { extend: 'pdf', text: '📄 PDF' },
      { extend: 'print', text: '🖨️ طباعة' }
    ],
    columnDefs: [
      { orderable: false, targets: [0, 17] },
      { width: '35px', targets: 0 },
      { width: '80px', targets: 3 }
    ]
  });

  // إرسال نموذج الإجازة الجماعية
  $('#bulkLeaveForm').on('submit', function(e) {
    e.preventDefault();

    const selected = $('.row-checkbox:checked').map((_, el) => el.value).get();
    if (!selected.length) return alert('الرجاء تحديد الجنود أولاً');

    $.ajax({
      url: $(this).attr('action'),
      method: 'POST',
      data: {
        soldiers: selected,
        start_leave: $('#startLeave').val(),
        end_leave: $('#endLeave').val(),
        _token: $('meta[name="csrf-token"]').attr('content')
      },
      success: res => {
        alert(res.message);
        location.reload();
      },
      error: err => {
        console.error(err);
        alert(err.responseJSON?.message || 'حدث خطأ غير متوقع');
      }
    });
  });
});
</script>
 
@endpush
