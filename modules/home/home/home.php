<div class="rightpanel">
        <ul class="breadcrumbs">
            <li><a href="index.php"><i class="iconfa-home"></i></a></li>            
            <div style="float:right !important; margin-right:10px"><?php echo date("l, d F Y");?></div>
        </ul>
               
        <div class="pageheader">
            <!--<form action="results.html" method="post" class="searchbar">
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>-->
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">
                <h1>Dashboard</h1>
                <h5>Selamat datang di Dishub Kota Cirebon</h5>
                
            </div>
        </div><!--pageheader-->
        
<div class="maincontent">
            <div class="maincontentinner">
                <div class="row-fluid">
                    <div id="dashboard-left" class="span8">
                        
                        <h5 class="subtitle">Recently Viewed Pages</h5>
                        <ul class="shortcuts">
                        <?php 
							metroicon('Profil Kampus','index.php?mod=kampus','iconfa-building','OliveDrab'); 
							metroicon('Navigation','index.php?mod=toplink','iconfa-sitemap','DeepPink');
							metroicon('Kategori','index.php?mod=kategori','iconfa-th-list','DimGray'); 
							//metroicon('Web Title','index.php?mod=','iconfa-bookmark','Purple');
  						    metroicon('Page','index.php?mod=page','iconfa-external-link','DarkOrange');
							//metroicon('Hiring Date','index.php?mod=','iconfa-calendar','Yellow'); 
							metroicon('Social Media','index.php?mod=sosmed','iconfa-facebook','Teal'); 
							//metroicon('Footer Text','index.php?mod=','iconfa-comment','Blue');
							metroicon('Password','index.php?mod=passwd','iconfa-key','Crimson');
							metroicon('Log Out','logout.php','iconfa-off','Black'); 
						
						?>
                            
                           
                        </ul>
                        
                        <br />
                        
                       
                        
                        <div class="divider30"></div>
                        
                        
                        
                        
                        
                    </div><!--span8-->
                    
                    <div id="dashboard-right" class="span4">
                        
                        <h5 class="subtitle">Announcements</h5>
                        
                        <div class="divider15"></div>
                        
                        <h4 class="widgettitle">Event Calendar</h4>
                        <div class="widgetcontent nopadding">
                            <div id="datepicker"></div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        <br />
                                                
                    </div><!--span4-->
                </div><!--row-fluid-->
                
                <?php
				   include 'footer.php';
				?>
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->