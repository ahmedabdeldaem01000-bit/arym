@extends('layout.app')

@section('title', 'تعديل بيانات الجندي')

@section('content')
  <section class="content">

    <div class="container-fluid">
    <div class="card card-blue">
      <div class="card-header">
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <h3 class="card-title">تعديل بيانات الجندي</h3>
      </div>
      <form action="{{ route('soldiers.update', $soldier->id) }}" enctype="multipart/form-data" method="POST">
        
        @csrf
        @method('PUT')
      <div class="card-body">
        <div class="row">

        <!-- الاسم -->
        <div class="col-4">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="name">الاسم</label>
          <input type="text" class="form-control" name="name" value="{{ old('name', $soldier->name) }}" placeholder="ادخل اسم الجندي">
        
        </div>

        <!-- رقم الشرطة -->
        <div class="col-4">
        @error('police_number')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="police_number">رقم الشرطه</label>
       
          <input type="text" class="form-control" name="police_number" value="{{ old('police_number', $soldier->police_number) }}" placeholder="ادخل رقم الشرطه" required>
        </div>

        <!-- الرقم القومي -->
        <div class="col-4">
          @error('national_id')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="exampleInputFile">ادخل الرقم القومي</label>
          <input type="text" class="form-control" name="national_id" value="{{ old('national_id', $soldier->national_id) }}" placeholder="ادخل الرقم القومي" required>
        </div>

        <!-- تاريخ التجنيد -->
        <div class="col-4">
          @error('date_of_conscription')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="date_of_conscription">تاريخ التجنيد</label>
          <input type="date" name="date_of_conscription" id="date_of_conscription" class="form-control" value="{{ old('date_of_conscription', $soldier->date_of_conscription) }}" required>
        </div>

        <!-- التسريح من التجنيد -->
        <div class="col-4">
          @error('discharge_from_conscription')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="exampleInputFile">التسريح من التجنيد</label>
          <input type="date" name="discharge_from_conscription" id="discharge_from_conscription" class="form-control" value="{{ old('discharge_from_conscription', $soldier->discharge_from_conscription) }}" required>
        </div>

        <!-- المحافظة -->
        <div class="col-4">
          @error('governorate')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="governorate">المحافظة</label>
          <input type="text" class="form-control" name="governorate" value="{{ old('governorate', $soldier->governorate) }}" placeholder="المحافظة">
        </div>

        <!-- رقم الهاتف -->
        <div class="col-4">
          @error('phone_number')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="exampleInputFile">رقم الهاتف</label>
          <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number', $soldier->phone_number) }}" placeholder="رقم الهاتف">
        </div>

        <!-- الحالة الطبية -->
        <div class="col-4">
          @error('medical_condition')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="exampleInputFile">الحاله الطبيه</label>
          <input type="text" class="form-control" name="medical_condition" value="{{ old('medical_condition', $soldier->medical_condition) }}" placeholder="الحاله الطبيه">
        </div>

        <!-- الوظيفة -->
<!-- job -->
<div class="col-4">
          @error('job')
        <div class="text-danger">{{ $message }}</div>
      @enderror
      <label for="job_id">الوظيفة</label>
      <select name="job_id" class="form-control">
    <option value="">اختر الوظيفة</option>
    @foreach($jobs as $job)
    <option value="{{ $job->id }}" {{ old('job_id') == $job->id ? 'selected' : '' }}>{{ $job->name }}</option>
    @endforeach
</select>
        </div>

        <!-- الملاحظات -->
        <div class="col-4">
          @error('notes')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="exampleInputFile">الملاحظات</label>
          <input type="text" class="form-control" name="notes" value="{{ old('notes', $soldier->notes) }}" placeholder="الملاحظات">
        </div>

 

        <!-- السرية -->
        <div class="col-4">
          @error('regiment_id')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="exampleInputFile">السرية</label>
          <select name="regiment_id" id="regiment_id" class="form-control" required>
          <option value="">اختر السرية</option>
          @foreach ($regiments as $regiment)
        <option value="{{ $regiment->id }}" {{ $soldier->regiment_id == $regiment->id ? 'selected' : '' }}>{{ $regiment->name }}</option>
      @endforeach
          </select>
        </div>

        <!-- الدفعه -->
        <div class="col-4">
          @error('batch_id')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="exampleInputFile">الدفعه</label>
          <select name="batch_id" id="batch_id" class="form-control" required>
        <option value="">-- اختر دفع الاجازة --</option>
        @foreach($batches as $batch)
            <option value="{{ $batch->id }}" {{ $soldier->batch_id == $batch->id ? 'selected' : '' }}>
                {{ $batch->name }}
            </option>
        @endforeach
    </select>
        </div>

        <!-- الجهة -->
        <div class="col-4">
          @error('authority_id')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="authority">الجهة</label>
          <select name="authority_id" id="authority_id" class="form-control" required>
          <option value="">اختر الجهة</option>
          @foreach ($authorities as $authority)
                <option value="{{ $authority->id }}" {{ $soldier->authority_id == $authority->id ? 'selected' : '' }}>
                    {{ $authority->name }}
                </option>
            @endforeach
          </select>
        </div>

        <!-- الصورة -->
        <div class="col-4">
          @error('image')
        <div class="text-danger">{{ $message }}</div>
      @enderror
           <label for="image">صورة الجندي:</label>
           <input type="file" name="image" id="image" class="form-control"  >
           @if ($soldier->image)
               <img src="{{ asset('storage/' . $soldier->image) }}" alt="Soldier Image" width="100">
           @endif
        </div>

      </div>

      <button type="submit" class="btn btn-primary">تعديل البيانات</button>

      </form>

    </div>
    </div>
  </section>
@endsection
