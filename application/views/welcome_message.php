<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Slim Cropper</title>    
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.bootcss.com/nprogress/0.2.0/nprogress.min.css">
	<!-- Styles -->
	<link href="<?php echo base_url(); ?>assets/css/common.css" rel="stylesheet">  
	<!--  Sweet alert -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/sweetalert2.css">
     <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert2.js"></script>  
</head>

<body>
	<div style="min-height: 100%;">


		<div class="container-fluid">
			<div class="container-page">        		
				<div class="container-fluid info-header">
					<div class="container">
						<div id="avatar-view" class="avatar">							
							<div class="slim"
							data-status-upload-success="Profile image updated"
							data-label-loading="File uploading.."
							data-instant-edit="true"
							data-service="<?php echo base_url(); ?>welcome/upload_avatar"
							data-push="true"
							data-ratio="1:1"
							data-label="Upload Image"
							data-size="360,360"
							data-max-file-size="2"
							data-will-remove="imageRemoved"
							style="border:3px solid #fff !important; background-color: none !important; background:none !important;border-radius:50%;">
							<img src="<?php echo $image['image_url']; ?>" width="300" height="300" alt="Profile image" class="upprofile-img" />
							<input type="file" name="slim[]"/>
						</div>						
					</div>					
				</div>				
			</div>

			<link href="<?php echo base_url(); ?>assets/js/slim/slim.min.css" rel="stylesheet">		
			<script src="<?php echo base_url(); ?>assets/js/slim/slim.kickstart.min.js"></script>
		</div>
	</div>

	<div  style="height: 60px;"> </div>
</div>

<footer class="footer">
	<div class="container">
		<span>Boominathan</span>
	</footer>
	<!-- Scripts -->
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdn.bootcss.com/nprogress/0.2.0/nprogress.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/common.js"></script>

	 <script type="text/javascript">
	 	 var base_url = '<?php echo base_url(); ?>';
            function imageRemoved(){
              swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.value) {

                  $.get(base_url+'welcome/delete_profile_image',function(res){
                    var obj = jQuery.parseJSON(res);
                    if(obj.status == true){
                     swal(
                      'Deleted!',
                      'Profile image has been deleted.',
                      'success'
                      );
                     $('.upprofile-img,img-responsive,.in,.out').attr('src',obj.image_url);                   
                   }else{
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'You dont have profile image yet!'                        
                    });
                  }

                });
                }
              });
            }
          </script>

</body>
</html>
