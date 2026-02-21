@extends('layout.app')

@section('title' , 'Dashboard')

@section('content')
 <div class="container">
   
   
        <div class="row">

          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
 
                <p>السرايا</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
                <h5 style="color: aliceblue; padding: 12PX;">{{"  عدد السرايا  :" .$RegimentCount}} </h5>
              </div>
              <h2>
                
              </h2>
              <!-- <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a> -->
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
 
                <p>الجنود</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
                <h5 style="color: aliceblue; padding: 12PX;">{{"  عدد الجنود  :" .$totalSoldiers }}</h5>
              </div>
              <!-- <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a> -->
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
 
                <p>الاجازات</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
                <h5 style="color: aliceblue; padding: 12PX;">{{ "  عدد الجنود  :" .$totalSoldiersLeaves}}</h5>
              </div>
              <!-- <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a> -->
            </div>
          </div>
     
        
        </div>
        
 
  
 </div>

@endsection