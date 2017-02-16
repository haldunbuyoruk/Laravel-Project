@extends('backend.layouts.app')
@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add New</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add New <small></small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="form" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    {{csrf_field()}}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="title" name="title" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Summary<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                      	<label for="message">Message (20 chars min, 100 max) :</label>
                          <textarea id="message" required="required" class="form-control" name="summary" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                            data-parsley-validation-threshold="10"></textarea>
                            </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Content<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                        	<textarea id="message" required="required" class="form-control ckeditor" name="content" ></textarea>
                     	</div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Image<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                        <input type="file" name="file" required>
                     	</div>
                     </div>
                      <div class="ln_solid"></div>
                      <div class="form-group" id="buttons">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
        </div>
@endsection

@section('js')
<script src="/js/jquery.validate.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script src="/js/ckeditor/ckeditor.js"></script>
<script src="/js/ckeditor/config.js"></script>
<script src="https://cdn.jsdelivr.net/sweetalert2/6.4.2/sweetalert2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#form').validate();
		$('#form').ajaxForm({
			beforeSubmit: function(){
				$('#buttons').fadeOut();
			},
			success: function(response){
				swal(
				  response.title,
				  response.msg,
				  'success'
				);
				CKEDITOR.instances[instance].setData("")
				document.getElementById("form").reset();
				$('#buttons').fadeIn();
			},
			beforeSerialize: function(){
				for (instance in CKEDITOR.instances) 
    				CKEDITOR.instances[instance].updateElement();
				$('form').serialize();
			}
		});
	});
</script>
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/sweetalert2/6.4.2/sweetalert2.min.css" />
@endsection