      <!-- Page content -->
  <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">

          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <form id="formFilter">
                <div class="row">

                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="h5">Pilih Pelanggan</label>
                      <select class="form-control" name="pelanggan">
                        <option></option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="h5">Pilih Petugas</label>
                      <select class="form-control" name="petugas">
                        <option></option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="h5">Start Date</label>
                      <input type="date" name="startDate" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="h5">End Date</label>
                      <input type="date" name="endDate" class="form-control">
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-warning" id="btnFilter">Filter</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="py-4">
              <table class="table table-flush" id="table-laporan">
                <thead class="thead-light">
                  <tr>
                    <th>No Invoice</th>
                    <th>Nama Pelanggan</th>
                    <th>Kategori</th>
                    <th>Nama Petugas</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <tbody id="table-data-laporan">

                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>