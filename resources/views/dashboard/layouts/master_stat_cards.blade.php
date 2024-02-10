 <!-- Small boxes (Stat box) -->
 <div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-white">
            <div class="inner">
                <h3>{{ $totalBooks }}</h3>

                <p>Total Books</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-white">
            <div class="inner">
                <h3>{{ $totalCategories }}<sup style="font-size: 20px"></sup></h3>

                <p>Total Categories</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-white">
            <div class="inner">
                <h3>{{ $totalCustomers }}</h3>

                <p>Total Customers</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-white">
            <div class="inner">
                <h3>{{ $totalSuppliers }}</h3>

                <p>Total Suppliers</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->