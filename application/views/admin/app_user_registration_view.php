<!--<div id="application_top_panel" class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">
            Create User
        </div>
    </div>

    <form name='userForm' id='userForm' enctype="multipart/form-data" class="form-horizontal form-widgets" role="form">
        <div class="panel-body">
            <div class="form-group">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-3 control-label label-required" for="loginId">Login ID:</label>

                        <div class="col-md-6">
                            <input type="email" class="k-textbox" id="loginId" name="loginId"
                                   placeholder="Unique Login ID (email)" required data-required-msg="Required"
                                   validationMessage="Invalid email" autofocus/>
                        </div>

                        <div class="col-md-3 pull-left">
                            <span class="k-invalid-msg" data-for="loginId"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label label-required" for="username">User Name:</label>

                        <div class="col-md-6">
                            <input type="text" class="k-textbox" id="username" name="username"
                                   placeholder="User Name" required validationMessage="Required"/>
                        </div>

                        <div class="col-md-3 pull-left">
                            <span class="k-invalid-msg" data-for="username"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label label-required" for="password">Password:</label>

                        <div class="col-md-6">
                            <input type="password" class="k-textbox" id="password" name="password"
                                   pattern="^.*(?=.{8,})(((?=.*[a-z])(?=.*[A-Z])(?=.*[\d]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[\W]))|((?=.*[a-z])(?=.*[\d])(?=.*[\W]))|((?=.*[A-Z])(?=.*[\d])(?=.*[\W]))).*$"
                                   placeholder="Letters,Numbers & Special Characters" required
                                   data-required-msg="Required"
                                   validationMessage="Invalid Combination or Length"/>
                        </div>

                        <div class="col-md-3 pull-left">
                            <span class="k-invalid-msg" data-for="password"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label label-required"
                               for="confirmPassword">Confirm Password:</label>

                        <div class="col-md-6">
                            <input type="password" class="k-textbox" id="confirmPassword" name="confirmPassword"
                                   pattern="^.*(?=.{8,})(((?=.*[a-z])(?=.*[A-Z])(?=.*[\d]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[\W]))|((?=.*[a-z])(?=.*[\d])(?=.*[\W]))|((?=.*[A-Z])(?=.*[\d])(?=.*[\W]))).*$"
                                   placeholder="Confirm password" required data-required-msg="Required"
                                   validationMessage="Invalid Combination or Length"/>
                        </div>

                        <div class="col-md-3 pull-left">
                            <span class="k-invalid-msg" data-for="confirmPassword"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label label-optional"
                               for="enabled">Enabled:</label>

                        <div class="col-md-6">
                            <checkBox class="form-control-static" name="enabled"/>
                        </div>

                        <div class="col-md-3 pull-left">
                            <span class="k-invalid-msg" data-for="enabled"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label label-optional"
                               for="accountLocked">Account Locked:</label>

                        <div class="col-md-6">
                            <checkBox class="form-control-static" name="accountLocked"/>
                        </div>

                        <div class="col-md-3 pull-left">
                            <span class="k-invalid-msg" data-for="accountLocked"></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label label-optional"
                               for="isPowerUser">Power User:</label>

                        <div class="col-md-6">
                            <checkBox class="form-control-static" name="isPowerUser"/>
                        </div>

                        <div class="col-md-3 pull-left">
                            <span class="k-invalid-msg" data-for="isPowerUser"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-3 control-label label-optional" for="cellNumber">Cell Number:</label>

                        <div class="col-md-6">
                            <input type="tel" class="k-textbox" id="cellNumber" name="cellNumber" pattern="\d{11}"
                                   placeholder="Mobile Number" validationMessage="Invalid phone No."/>
                        </div>

                        <div class="col-md-3 pull-left">
                            <span class="k-invalid-msg" data-for="cellNumber"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label label-optional" for="ipAddress">IP Address:</label>

                        <div class="col-md-6">
                            <input type="text" class="k-textbox" id="ipAddress" name="ipAddress"
                                   pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}$"
                                   placeholder="IP Address" validationMessage="Invalid IP"/>
                        </div>

                        <div class="col-md-3 pull-left">
                            <span class="k-invalid-msg" data-for="ipAddress"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label label-optional"
                               for="signatureImage">Signature Image:</label>

                        <div class="col-md-6">
                            <input type="file" class="form-control-static" id="signatureImage" name="signatureImage"/>
                        </div>

                        <div class="col-md-3 pull-left">
                            <span class="k-invalid-msg" data-for="signatureImage"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-footer">

            <button id="create" name="create" type="submit" data-role="button" class="k-button k-button-icontext"
                    role="button"
                    aria-disabled="false"><span class="k-icon k-i-plus"></span>Create
            </button>

            <button id="clearFormButton" name="clearFormButton" type="button" data-role="button"
                    class="k-button k-button-icontext" role="button"
                    aria-disabled="false" onclick='resetAppUserForm();'><span class="k-icon k-i-close"></span>Cancel
            </button>
        </div>
        <form>
</div>-->

<body>
<div class="container">
    <div class="modal-body">
        <div class="login-panel panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title align-center">Create User</h3>
            </div>
            <form name='userForm' id='userForm' enctype="multipart/form-data" class="form-horizontal form-widgets" role="form" method="post">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-10">
                            <input type="hidden" value="1" name="enabled" id="enabled"/>
                            <input type="hidden" value="1" name="password_expired" id="password_expired"/>
                            <fieldset>
                                <?php if (validation_errors()){ ?>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger" role="alert">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <?php echo validation_errors(); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>


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
                                        <input type="password" class="form-control" id="password" name="password" value="arafat@123"
                                               pattern="^.*(?=.{8,})(((?=.*[a-z])(?=.*[A-Z])(?=.*[\d]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[\W]))|((?=.*[a-z])(?=.*[\d])(?=.*[\W]))|((?=.*[A-Z])(?=.*[\d])(?=.*[\W]))).*$"
                                               placeholder="Letters,Numbers & Special Characters" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="confirm_password">Confirm Your Password:</label>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control" id="confirm_password" value="arafat@123"
                                               name="confirm_password"
                                               pattern="^.*(?=.{8,})(((?=.*[a-z])(?=.*[A-Z])(?=.*[\d]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[\W]))|((?=.*[a-z])(?=.*[\d])(?=.*[\W]))|((?=.*[A-Z])(?=.*[\d])(?=.*[\W]))).*$"
                                               placeholder="Letters,Numbers & Special Characters" required oninput="check(this)"/>

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
                                    <label class="col-md-3 control-label label-required" for="cell_number">Cell Number:</label>
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
                            class="btn btn-submit btn-success"><span class="glyphicon glyphicon-plus"></span>Create
                    </button>

                    <button id="clearFormButton" name="clearFormButton" type="reset"
                            class="btn btn-submit btn-danger" ><span class="glyphicon glyphicon-remove">Cancel
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
