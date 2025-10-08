
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
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
                    <label class="form-label">Marital status <span class="text-danger">*</span></label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="marital_status" id="single" value="single" required />
                      <label class="form-check-label" for="single">Single</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="marital_status" id="married" value="married" required />
                      <label class="form-check-label" for="married">Married</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <label class="form-label">Allergies to medicine <span class="text-danger">*</span></label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="allergies" id="allergies_yes" value="yes" required />
                      <label class="form-check-label" for="allergies_yes">Yes</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="allergies" id="allergies_no" value="no" required />
                      <label class="form-check-label" for="allergies_no">No</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <label class="form-label">Diseases <span class="text-danger">*</span></label>
                    <textarea class="form-control bg-light border-0" rows="5" placeholder="Mention diseases that you have (if none, please write 'None')" name='Dieases' required></textarea>
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
