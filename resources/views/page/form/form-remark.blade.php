<!-- Page -->
	<div class="page animsition">
	    <div class="page-header">
	      <h1 class="page-title">Form General Elements</h1>
	      <ol class="breadcrumb">
	        <li><a href="../index.html">Home</a></li>
	        <li><a href="javascript:void(0)">Forms</a></li>
	        <li class="active">General</li>
	      </ol>
	      <div class="page-header-actions">
	        <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round"
	        data-toggle="tooltip" data-original-title="Edit">
	          <i class="icon wb-pencil" aria-hidden="true"></i>
	        </button>
	        <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round"
	        data-toggle="tooltip" data-original-title="Refresh">
	          <i class="icon wb-refresh" aria-hidden="true"></i>
	        </button>
	        <button type="button" class="btn btn-sm btn-icon btn-default btn-outline btn-round"
	        data-toggle="tooltip" data-original-title="Setting">
	          <i class="icon wb-settings" aria-hidden="true"></i>
	        </button>
	      </div>
	    </div>
	    <div class="page-content">
	      

	      <!-- Panel Checkbox & Radio -->
	      	<div class="panel">
	        <div class="panel-heading">
	          <h3 class="panel-title">Checkbox & Radio
	            <small><a class="example-plugin-link" href="http://flatlogic.github.io/awesome-bootstrap-checkbox/demo/"
	              target="_blank">official website</a></small>
	          </h3>
	        </div>
	        <div class="panel-body container-fluid">
	          <div class="row row-lg">
	            <div class="col-sm-6 col-lg-4">
	              <!-- Example Checkboxes -->
	              <div class="example-wrap">
	                <h4 class="example-title">Checkboxes</h4>
	                <p>Add class <code>.checkbox</code>to make it.</p>
	                <div class="checkbox-custom checkbox-primary">
	                  <input type="checkbox" id="inputUnchecked" />
	                  <label for="inputUnchecked">Unchecked</label>
	                </div>
	                <div class="checkbox-custom checkbox-primary">
	                  <input type="checkbox" id="inputChecked" checked />
	                  <label for="inputChecked">Checked</label>
	                </div>
	                <div class="checkbox-custom">
	                  <input type="checkbox" disabled />
	                  <label>Disabled Unchecked</label>
	                </div>
	                <div class="checkbox-custom">
	                  <input type="checkbox" disabled checked />
	                  <label>Checked Disabled</label>
	                </div>
	              </div>
	              <!-- End Example Checkboxes -->
	            </div>

	            <div class="col-sm-6 col-lg-4">
	              <!-- Example Radios -->
	              <div class="example-wrap">
	                <h4 class="example-title">Radios</h4>
	                <p>Add class <code>.radio</code>to make it.</p>

	                <div class="radio-custom radio-primary">
	                  <input type="radio" id="inputRadiosUnchecked" name="inputRadios" />
	                  <label for="inputRadiosUnchecked">Unchecked</label>
	                </div>
	                <div class="radio-custom radio-primary">
	                  <input type="radio" id="inputRadiosChecked" name="inputRadios" checked />
	                  <label for="inputRadiosChecked">Checked</label>
	                </div>
	                <div class="radio-custom radio-primary">
	                  <input type="radio" id="inputRadiosDisabled" name="inputRadiosDisabled" disabled
	                  />
	                  <label for="inputRadiosDisabled">Disabled Unchecked</label>
	                </div>
	                <div class="radio-custom radio-primary">
	                  <input type="radio" id="inputRadiosDisabledChecked" name="inputRadiosDisabledChecked"
	                  disabled checked />
	                  <label for="inputRadiosDisabledChecked">Checked Disabled</label>
	                </div>
	              </div>
	              <!-- End Example Radios -->
	            </div>

	            <div class="col-sm-6 col-lg-4">
	              <!-- Example Color Options -->
	              <div class="example-wrap">
	                <h4 class="example-title">Color Options</h4>
	                <p>Add class <code>.checkbox-default</code>, <code>.checkbox-primary</code>,
	                  <code>.checkbox-success</code>, <code>.checkbox-info</code>,
	                  <code>.checkbox-warning</code>, <code>.checkbox-danger</code>,
	                  to change styles.</p>
	                <ul class="list-unstyled list-inline">
	                  <li>
	                    <div class="checkbox-custom">
	                      <input type="checkbox" name="inputCheckboxes" checked />
	                      <label></label>
	                    </div>
	                  </li>
	                  <li>
	                    <div class="checkbox-custom checkbox-default">
	                      <input type="checkbox" name="inputCheckboxes" checked />
	                      <label></label>
	                    </div>
	                  </li>
	                  <li>
	                    <div class="checkbox-custom checkbox-primary">
	                      <input type="checkbox" name="inputCheckboxes" checked />
	                      <label></label>
	                    </div>
	                  </li>
	                  <li>
	                    <div class="checkbox-custom checkbox-success">
	                      <input type="checkbox" name="inputCheckboxes" checked />
	                      <label></label>
	                    </div>
	                  </li>
	                  <li>
	                    <div class="checkbox-custom checkbox-info">
	                      <input type="checkbox" name="inputCheckboxes" checked />
	                      <label></label>
	                    </div>
	                  </li>
	                  <li>
	                    <div class="checkbox-custom checkbox-warning">
	                      <input type="checkbox" name="inputCheckboxes" checked />
	                      <label></label>
	                    </div>
	                  </li>
	                  <li>
	                    <div class="checkbox-custom checkbox-danger">
	                      <input type="checkbox" name="inputCheckboxes" checked />
	                      <label></label>
	                    </div>
	                  </li>
	                </ul>

	                <ul class="list-unstyled list-inline">
	                  <li>
	                    <div class="radio-custom">
	                      <input type="radio" id="inputRadioNormal" name="inputRadiosNormal" checked />
	                      <label for="inputRadioNormal"></label>
	                    </div>
	                  </li>
	                  <li>
	                    <div class="radio-custom radio-default">
	                      <input type="radio" name="inputRadioDefault" checked />
	                      <label></label>
	                    </div>
	                  </li>
	                  <li>
	                    <div class="radio-custom radio-primary">
	                      <input type="radio" name="inputRadioPrimary" checked />
	                      <label></label>
	                    </div>
	                  </li>
	                  <li>
	                    <div class="radio-custom radio-success">
	                      <input type="radio" name="inputRadioSuccess" checked />
	                      <label></label>
	                    </div>
	                  </li>
	                  <li>
	                    <div class="radio-custom radio-info">
	                      <input type="radio" name="inputRadioInfo" checked />
	                      <label></label>
	                    </div>
	                  </li>
	                  <li>
	                    <div class="radio-custom radio-warning">
	                      <input type="radio" name="inputRadioWarning" checked />
	                      <label></label>
	                    </div>
	                  </li>
	                  <li>
	                    <div class="radio-custom radio-danger">
	                      <input type="radio" name="inputRadioDanger" checked />
	                      <label></label>
	                    </div>
	                  </li>
	                </ul>
	              </div>
	              <!-- End Example Color Options -->
	            </div>
	          </div>
	        </div>
	      	</div>
	      <!-- End Panel Checkbox & Radio -->
	    </div>
	</div>
	<!-- End Page -->