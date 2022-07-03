<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Tiga Tungku</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">TT</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item <?php echo uri_string() == 'admin' ? 'active' : '' ?>">
                <a href="<?php echo base_url('/admin') ?>" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
              </li>

              <li class="menu-header">Data</li>
              <li class="nav-item dropdown <?php echo (uri_string() == 'admin/menu' or uri_string() == 'admin/ingre') ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-boxes"></i> <span>Master Data</span></a>
                <ul class="dropdown-menu">
                  <li <?php echo uri_string() == 'admin/menu' ? 'class="active"' : '' ?>><a class="nav-link" href="<?php echo base_url('/admin/menu') ?>">Data Menu</a></li>
                  <li <?php echo uri_string() == 'admin/ingre' ? 'class="active"' : '' ?>><a class="nav-link" href="<?php echo base_url('/admin/ingre') ?>">Data Ingredients</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cash-register"></i> <span>Transactions</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('/admin/order') ?>">Pending Order</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('/admin/order/incoming') ?>">Incoming Order</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('/admin/order/history') ?>">History</a></li>
                </ul>
              </li>
              <li <?php echo uri_string() == 'admin/ingre/restock' ? 'class="active"' : '' ?> ><a class="nav-link" href="<?php echo base_url('/admin/ingre/restock') ?>"><i class="fas fa-sync"></i> <span>Restock</span></a></li>
              
            </ul>
        </aside>
      </div>