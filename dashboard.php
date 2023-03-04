                <?php

                include('rms.php');

				$object = new rms();

				if(!$object->is_login())
				{
				    header("location:".$object->base_url."");
				}
                include('header.php');
              

                ?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Welcome to Ghar</h1>

                    <!-- Content Row -->
                    <div class="row">
                        <?php
                        if($object->is_master_user())
                        {
                        ?>
                    <?php
                    }
                    ?>
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="m-0 font-weight-bold text-primary">Live Table Status</h6>
                                        </div>
                                        <div class="col" align="right">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="table_status"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                include('footer.php');
                ?>

<script>

$(document).ready(function(){

    reset_table_status();

    setInterval(function(){
        reset_table_status();
    }, 5000);

    function reset_table_status()
    {
        $.ajax({
            url:"order_action.php",
            method:"POST",
            data:{action:'dashboard_reset'},
            success:function(data){
                $('#table_status').html(data);
            }
        });
    }

});

</script>