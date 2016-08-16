<body>
<div class="container">
    <div class="modal-body">
        <div class="login-panel panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title align-center">Create User</h3>
            </div>
            <form name='userForm' id='userForm' enctype="multipart/form-data" class="form-horizontal form-widgets"
                  role="form" method="post">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-10">
                            <input type="hidden" value="1" name="enabled" id="enabled"/>
                            <input type="hidden" value="1" name="password_expired" id="password_expired"/>
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="alert alert-success" role="alert">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                                            <?php echo $completed; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">Full Name:</label>

                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="name" id="name"
                                               placeholder="Full Name" required autofocus/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="email">Email:</label>

                                    <div class="col-md-7">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email"
                                               pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                               required="required"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="password">Password:</label>

                                    <div class="col-md-7">
                                        <input type="password" class="form-control" id="password" name="password"
                                               value="arafat@123"
                                               pattern="^.*(?=.{8,})(((?=.*[a-z])(?=.*[A-Z])(?=.*[\d]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[\W]))|((?=.*[a-z])(?=.*[\d])(?=.*[\W]))|((?=.*[A-Z])(?=.*[\d])(?=.*[\W]))).*$"
                                               placeholder="Letters,Numbers & Special Characters" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="confirm_password">Confirm Your
                                        Password:</label>

                                    <div class="col-md-7">
                                        <input type="password" class="form-control" id="confirm_password"
                                               value="arafat@123"
                                               name="confirm_password"
                                               pattern="^.*(?=.{8,})(((?=.*[a-z])(?=.*[A-Z])(?=.*[\d]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[\W]))|((?=.*[a-z])(?=.*[\d])(?=.*[\W]))|((?=.*[A-Z])(?=.*[\d])(?=.*[\W]))).*$"
                                               placeholder="Letters,Numbers & Special Characters" required
                                               oninput="check(this)"/>

                                        <script language='javascript' type='text/javascript'>
                                            function check(input) {
                                                if (input.value != document.getElementById('password').value) {
                                                    input.setCustomValidity('Password Must be Matching.');
                                                } else {
                                                    // input is valid -- reset the error message
                                                    input.setCustomValidity('');
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label label-required" for="cell_number">Cell
                                        Number:</label>

                                    <div class="col-md-7">
                                        <input type="tel" class="form-control" id="cell_number" name="cell_number"
                                               pattern="[0][1-9]{4}[-][0-9]{6}"
                                               placeholder="Mobile Number (Format: 01XXX-XXXXXX)"/>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="panel-footer panel-info">

                    <button id="create" name="create" type="submit" data-role="button"
                            class="btn btn-submit btn-success">Create
                    </button>

                    <button id="clearFormButton" name="clearFormButton" type="reset"
                            class="btn btn-submit btn-success">Cancel
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>


<!-- Custom Theme JavaScript -->

<script src="<?php echo base_url(); ?>/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>js/admin.regis.js"></script>

<script>
    addEventListener('load', prettyPrint, false);
    $(document).ready(function () {
        $('pre').addClass('prettyprint linenums');
    });
</script>


</body>
