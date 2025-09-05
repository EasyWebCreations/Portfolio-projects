                                <form class="form" method="post" action="settings.php">
                                    <!-- Steps -->
                                    <div class="form">
                                        <div class="input-group row">
                                            <label class="col" for="username ">Emp_ID</label>
                                            <input class="col" type="text" name="EMP_ID"
                                                value="<?= $row['EMP_ID'] ?>" />
                                        </div>
                                        <div class="row">
                                            <p></p>
                                        </div>
                                        <div class="input-group row">
                                            <label class="col" for="username ">Site_ID</label>
                                            <input class="col" type="text " name="SITE_ID"
                                                value="<?= $row['SITE_ID'] ?>" />
                                        </div>
                                        <div class="row">
                                            <p></p>
                                        </div>
                                        <div class="input-group row">
                                            <label class="col" for="username ">Name</label>
                                            <input class="col" type="text " name="EMP_NAME"
                                                value="<?= $row['EMP_NAME'] ?>" />
                                        </div>
                                        <div class="row">
                                            <p></p>
                                        </div>
                                        <div class="input-group row">
                                            <label class="col" for="username ">Mobile</label>
                                            <input class="col" type="text " name="EMP_MOBILE"
                                                value="<?= $row['EMP_MOBILE'] ?>" />
                                        </div>
                                        <div class="row">
                                            <p></p>
                                        </div>
                                        <div class="input-group row" style="display: flex; ">
                                            <label class="col" for="username ">Address</label>
                                            <input class="col" type="text " name="EMP_ADDRESS"
                                                value="<?= $row['EMP_ADDRESS'] ?>" />
                                        </div>
                                        <div class="row">
                                            <p></p>
                                        </div>
                                        <div class="input-group row">
                                            <label class="col" for="username ">Aadhar</label>
                                            <input class="col" type="text" name="AADHAR"
                                                value="<?= $row['AADHAR'] ?>" />
                                        </div>
                                        <div class="row">
                                            <p></p>
                                        </div>
                                        <div class="input-group row" style="display: flex; ">
                                            <label class="col" for="username ">UAN</label>
                                            <input class="col" type="text" name="UAN_NO"
                                                value="<?= $row['UAN_NO'] ?>" />
                                        </div>
                                        <div class="row">
                                            <p></p>
                                        </div>
                                        <div class="input-group row">
                                            <label class="col" for="username">ESIC</label>
                                            <input class="col" type="text" name="ESIC_NO"
                                                value="<?= $row['ESIC_NO'] ?>" />
                                        </div>
                                        <div class="row">
                                            <p></p>
                                        </div>
                                        <div class="input-group row" style="display: flex; ">
                                            <label class="col" for="username ">Bank_ACC</label>
                                            <input class="col" type="text" name="BANK_AC_NO"
                                                value="<?= $row['BANK_AC_NO'] ?>" />
                                        </div>
                                        <div class="row">
                                            <p></p>
                                        </div>
                                        <div class="input-group row">
                                            <label class="col" for="username ">IFSC_Code</label>
                                            <input class="col" type="text" name="IFSC_CODE"
                                                value="<?= $row['IFSC_CODE'] ?>" />
                                        </div>
                                        <div class="row">
                                            <p></p>
                                        </div>
                                        <div class="input-group row" style="display: flex; ">
                                            <label class="col" for="username ">Bank_Name</label>
                                            <input class="col" type="text" name="BNK_NAME"
                                                value="<?= $row['BNK_NAME'] ?>" />
                                        </div>
                                        <div class="row">
                                            <p></p>
                                        </div>
                                        <div class="input-group row">
                                            <label class="col" for="username ">Bank_Address</label>
                                            <input class="col" type="text" name="BNK_ADDRESS"
                                                value="<?= $row['BNK_ADDRESS'] ?>" />
                                        </div>
                                        <div class="row">
                                            <p></p>
                                        </div>
                                        <div class="input-group row" style="display: flex; ">
                                            <label class="col" for="username">Designation</label>
                                            <input class="col" type="text" name="DESIGNATION"
                                                value="<?= $row['DESIGNATION'] ?>" />
                                        </div>
                                        <div class="row">
                                            <p></p>
                                        </div>
                                        <div class="input-group row">
                                            <label class="col" for="username">Category</label>
                                            <input class="col" type="text" name="CATEGORY"
                                                value="<?= $row['CATEGORY'] ?>" />
                                        </div>
                                        <div class="row">
                                            <p></p>
                                        </div>
                                        <div class="input-group row" style="display: flex; ">
                                            <label class="col" for="username ">Basic_Salary</label>
                                            <input class="col" type="text" name="BASIC_SAL"
                                                value="<?= $row['BASIC_SAL'] ?>" />
                                        </div>
                                        <div class="row">
                                            <p></p>
                                        </div>
                                        <div class="input-group row">
                                            <label class="col" for="username ">HRA</label>
                                            <input class="col" type="text" name="HRA_SAL"
                                                value="<?= $row['HRA_SAL'] ?>" />
                                        </div>
                                        <div class="row">
                                            <p></p>
                                        </div>
                                        <div class="input-group row" style="display: flex;">
                                            <label class="col" for="username">PDA</label>
                                            <input class="col" type="text" name="SPL_ALLOW"
                                                value="<?= $row['ALLOW'] ?>" />
                                        </div>
                                        <div class="row">
                                            <p></p>
                                        </div>
                                        <input type="hidden" name="STATUS" value="<?= $row['STATUS'] ?>" />
                                        <input id="update_emp" type="submit" name="submit" value="Submit"
                                            class="btn btn-success" />
                                    </div>

                                </form>