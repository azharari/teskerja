<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Welcome <?php echo $this->session->userdata('Username'); ?></p>
				<?php 
					if($this->session->userdata('Level') == '1')
					{
						$Jabatan = 'Admin';
						$Icon_Jabatan = 'success';
					}
					else
					{
						$Jabatan = 'Customer';
						$Icon_Jabatan = 'warning';
					}
				?>
                <a href="#"><i class="fa fa-user text-<?php echo $Icon_Jabatan ?>"></i> <?php echo $Jabatan ?> </a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
				
            </div>
			<!--
			<select class="form-control">
                <option>S</option>
				<option>REQUEST PART STATUS</option>
				<option>ATM CRO</option>
            </select>
			-->
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
		<?php 
		if($this->session->userdata('Level') == '1')
		{
		?>
        <ul class="sidebar-menu">
            <li class="header">MENU ADMIN</li>
			<li><?php echo anchor('Admin/Admin/index', '<i class="fa fa-car"></i> Data Mobil'); ?></li>
            
            <li><?php echo anchor('Dokumen/Dokumen/index', '<i class="fa fa-print"></i> Dokumen Mobil'); ?></li>
            
        </ul>
		
		<?php 
		}
		else
		{
		?>
		<ul class="sidebar-menu">
            <li class="header">MENU CUSTOMER</li>
            <li>
                <a href="#">
                    <i class="fa fa-home text-primary"></i> <span>Home</span> <!-- <i class="fa fa-angle-left pull-right"></i> -->
                </a>
            </li>
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-car text-primary"></i> <span>Approve Kendaraan</span>
                </a>
               
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-mail-reply text-primary"></i> <span>Data Transaksi</span>
                    <i class="fa  fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><?php echo anchor('stok/sparepart', '<i class="fa fa-circle-o"></i> Daftar Transaksi'); ?></li>
                    <li><?php echo anchor('stok/cassette_atm', '<i class="fa fa-circle-o"></i> History Transaksi'); ?></li>
                </ul>
			</li>
        </ul>
		<?php 
		}
		?>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">