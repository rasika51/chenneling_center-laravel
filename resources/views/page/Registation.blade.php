
@extends('layouts.layout1')


@section('page-content')
    <div
      class="container-fluid mb-5"
      style="padding-top: 14rem !important; padding-bottom: 3rem !important"
    >
      <div class="container">
        <div
          class="row justify-content-center position-relative"
          style="margin-top: -275px; z-index: 1"
        >
          <div class="col-lg-8">
            <div class="boddyofconetend bg-white p-5 m-5 mb-0">
              <h3 class="mb-5">Registation Form</h3>

              <form method="POST" action="/Registationnewuser">
                @csrf
                <div class="row g-3">
                  <div class="col-12">
                    <input
                      type="Text"
                      class="form-control bg-light border-0"
                      placeholder="Full Name"
                      name="fullname"
                      style="height: 55px" required
                    />
                  </div>
                  <div class="col-12">
                    <input
                      type="email"
                      name="email"
                      class="form-control bg-light border-0"
                      placeholder="Email"
                      style="height: 55px" required
                    />
                  </div>
                  <div class="col-12">
                    <input
                      type="password"
                      name="password"
                      class="form-control bg-light border-0"
                      placeholder="password"
                      style="height: 55px" required
                    />
                  </div>

                  <div class="col-12">
                    <select
                      class="form-control bg-light border-0"
                      style="height: 55px" required name='gender'
                    >
                      <option value="0" selected>Select Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>

                  <div class="col-12">
                    <input
                      type="date"
                      name="dob"
                      class="form-control bg-light border-0"
                      placeholder="Date of birth"
                      style="height: 55px" required
                    />
                  </div>

                  <div class="col-12">
                    <input
                      type="number"
                      name="contactnum"
                      class="form-control bg-light border-0"
                      placeholder="Contact No"
                      style="height: 55px" required
                    />
                  </div>

                  <div class="col-12">
                    <input
                      type="text"
                      class="form-control bg-light border-0"
                      placeholder="Address"
                      name="addresss"
                      style="height: 55px" required
                    />
                  </div>



                  <div class="col-12">
                    Marital status
                    <label class="ms-5">
                      <input type="checkbox" name="Marital_single" /> Single
                    </label>
                    <label class="ms-3">
                      <input type="checkbox" name="Marital_Married" /> Married
                    </label>
                  </div>


                  <div class="col-12">
                    Allegics to mediciine
                    <label class="ms-5">
                      <input type="checkbox" name="Allegics_yes" /> yes
                    </label>
                    <label class="ms-3">
                      <input type="checkbox" name="Allegics_no" /> No
                    </label>
                  </div>

                  <div class="col-12">
                    <div class="col-12">
                        <textarea class="form-control bg-light border-0" rows="5" placeholder="Mention Dieases that your here.." name='Dieases'></textarea>
                    </div>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="submit">
                      Submit
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Contact End -->
    @endsection
