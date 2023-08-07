<x-system-layout>

<main id="main" class="main">
    <div class="row g-3">
      <div class="pagetitle col-md-10">
        <h1>Walk-in</h1>
          <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Receipts</li>
                <li class="breadcrumb-item active">Walk-in</li>
              </ol>
            </nav>
       </div>
  </div><!-- End Page Title -->

    <section class="section">

        <div class="card recent-sales overflow-auto rounded-5">
          <div class="card-body table-responsive">
            <h3 class="card-title text-center" style="font-size: 30px;">UNIT FORM</h3>
             <form class="row g-3">
              <div class="col-md-3">
                <div class=" input-group">
                  <div class="input-group-text">TNX No:</div>
                  <input type="text" class="form-control" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">&nbsp;</label>
              </div>
              
            <div class="col-md-4">
                <div class="input-group">
                <div class="col-md-3 input-group-text ">Name:</div>
                <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                <div class="col-md-3 input-group-text ">Phone:</div>
                <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                <div class="input-group-text ">Date:</div>
                <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                <div class="input-group-text ">Year:</div>
                <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                <div class="input-group-text ">Make:</div>
                <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                <div class="input-group-text ">Model:</div>
                <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                <div class="input-group-text ">Variant:</div>
                <input type="text" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <div class=" input-group">
                    <div class="input-group-text ">Booking Type:</div>
                    <label for="exampleFormControlInput1" class="form-label"></label>
                    <input type="email" class="form-control text-center" id="exampleFormControlInput1" placeholder="Walk-in" disabled>    
                </div>
                </div>
            <div class="col-md-4">
                <div class="input-group">
                <div class="col-md-4 input-group-text ">Plate No.</div>
                <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                <div class="input-group-text ">Unit Price:</div>
                <input type="text" class="form-control">
                </div>
            </div>

            <div class="col-md-8 text-center">
                <label class="form-label ">&nbsp;</label>
            </div>
            <div class="col-md-4 d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-danger me-md-2" type="button">CANCEL</button>
                <button class="btn btn-success" type="button">SAVE</button>
            </div>
            
            </form>
                        </div>
                    </div>
                    </div>
                </div><!-- End Recent Sales -->
                </section>

  </main><!-- End #main -->
</x-system-layout>