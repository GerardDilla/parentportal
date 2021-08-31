



<div class="content">
      <div class="row">
            <div class="col-md-12">
                    <div class="card" style="overflow-x: auto;">
                            <div class="card-header">
                               <h4 class="card-title"> Events</h4>
                            </div>
                            <hr />
          <div style="margin-left: 50px; margin-top: 40px;">
          <!--Content--!-->
        



        <form class="form-inline" style="margin-top:20px; display:inline-block;" action="event" method="post">
         <label for="cate">Department:</label>
                <select style="width:250px;" class="form-control" id="cate" name="cate">
                <option>All</option>
                <option>SIHTM</option>
                <option>SASE</option>
                <option>SHSP</option>
                <option>SBCS</option>
                </select>
    

      <button class="btn btn-info" type="submit">Sort</button>
        
        
        </form>
        <form class="form-inline" style="margin-top:20px; display:inline-block;" action="event" method="post">
        <button class="btn btn-info" type="submit" name="events_refresh" value="">Refresh</button>
        </form>
 
        
          
    <?php 
    
    echo $events;
    
    ?>
            <script type="text/javascript">
            
            function printpage(){
                window.print();
                }
            </script>







          </div>
          </div>
        </div><!--BODY--!-->
      </div>
    </div>


        

    