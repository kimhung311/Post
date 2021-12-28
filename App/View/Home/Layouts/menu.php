  <!-- Start nav -->
  <nav class="menu">
      <div class="container">
          <div class="brand">
              <a href="#">
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHXjNGSRq1MDhl4QrulTLJUINqI8R85ZNazg&usqp=CAU"
                      alt="Magz Logo">
              </a>
          </div>
          <div class="mobile-toggle">
              <a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
          </div>
          <div class="mobile-toggle">
              <a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
          </div>
          <div id="menu-list">
              <ul class="nav-list">
                  <li class="for-tablet nav-title"><a>Menu</a></li>
                  <li class="for-tablet"><a href="login.html">Login</a></li>
                  <li class="for-tablet"><a href="register.html">Register</a></li>
                  <li><a href="<?php echo BASE_URL ?>">Home</a></li>

                  <li class="dropdown magz-dropdown"><a href="<?php echo BASE_URL ?>">Category <i
                              class="ion-ios-arrow-right"></i></a>
                      <ul class="dropdown-menu">
                          <?php
                            $counter = 0;
                            foreach ($categories as $category) :
                                $counter++;
                                if ($counter >= 10) {
                                    break;
                                }

                            ?>
                          <li> <a
                                  href="<?php echo Post_Detail ?>CategoryBydId/<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></a>
                          </li>

                          <?php endforeach; ?>
                      </ul>
                  </li>
                  <li><a href="<?php echo Post_Detail ?>listPosts">List
                          Post
                          <i class="ion-ios-arrow-right"></i>
                          <div class="badge">Hot</div>
                      </a>
                  </li>
                  <li class="dropdown magz-dropdown magz-dropdown-megamenu"><a href="#">Contract <i
                              class="ion-ios-arrow-right"></i></a>

                  </li>
                  <li class="dropdown magz-dropdown"><a href="#"> <i class="ion-ios-arrow-right"></i></a>
                      <ul class="dropdown-menu">
                          <li><a href="#"><i class="icon ion-person"></i> My Account</a></li>
                          <li><a href="#"><i class="icon ion-heart"></i> Favorite</a></li>
                          <li><a href="#"><i class="icon ion-chatbox"></i> Comments</a></li>
                          <li><a href="#"><i class="icon ion-key"></i> Change Password</a></li>
                          <li><a href="#"><i class="icon ion-settings"></i> Settings</a></li>
                          <li class="divider"></li>
                          s <li><a href="#"><i class="icon ion-log-out"></i> Logout</a></li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
  <!-- End nav -->