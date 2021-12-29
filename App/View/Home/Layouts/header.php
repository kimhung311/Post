    <div class="firstbar">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="brand">
                        <a href="index.html">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHXjNGSRq1MDhl4QrulTLJUINqI8R85ZNazg&usqp=CAU"
                                alt="Magz Logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <form class="search" autocomplete="off">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="q" class="form-control" placeholder="Type something here">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><i class="ion-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 col-sm-12 text-right">
                    <ul class="nav-icons">
                        <?php
                        ?>
                        <?php if (isset($_SESSION['auth_user'])) { ?>
                        <li>
                            <a href="register.html"><i class="ion-person-add"></i>
                                <div><?php echo $_SESSION['auth_user']['name']; ?></div>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo BASE_URL ?>homepage/logoutUser"><i class="ion-person"></i>
                                <div>Logout</div>
                            </a>
                        </li>
                        <?php } else { ?>
                        <!-- chạy lại coi thu -->
                        <li>
                            <a href="<?php echo BASE_URL ?>homepage/register"><i class="ion-person-add"></i>
                                <div>Register</div>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo BASE_URL ?>homepage/loginUser"><i class="ion-person"></i>
                                <div>Login</div>
                            </a>
                        </li>
                        <?php  }  ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>