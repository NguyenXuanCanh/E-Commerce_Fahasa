<style>
  .search{
      border: none;
      outline: none;
  }
  .sp-item{
    transition: 0.4s;
  }
  .sp-item:hover{
      background-color: #CDC4F9;
  }
  .rounded-3{
    border-radius: 8px;
  }
</style>
<?php
require_once('connection.php');
$adminID=$_SESSION['userId'];
$customer=$conn->query("SELECT * FROM messages WHERE IncomingID='$adminID' GROUP BY OutgoingID");

?>
<section >
  <div class="">

    <div class="row">
      <div class="col-md-12">

        <div class="card" id="chat3" style="border-radius: 15px; ">
          <div class="card-body">

            <div class="row">
              <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">

                <div class="p-3">

                  <div class="input-group rounded mb-3">
                    <input type="search" class="form-control rounded search" placeholder="Search" aria-label="Search"
                      aria-describedby="search-addon" />
                  </div>

                  <div data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px;" >
                    <ul class="list-unstyled mb-0">
                      <?php
                      foreach($customer as $row){
                        $cusID=$row['OutgoingID'];
                        $cus=$conn->query("SELECT FullName FROM customers WHERE CustomerID='$cusID'");
                        $cus=$cus->fetch_assoc();
                      ?>
                      <li class="p-2 border-bottom sp-item" onclick="selectSuporter('<?=$row['OutgoingID']?>')">
                        <a href="#!" class="d-flex justify-content-between">
                          <div class="d-flex flex-row">
                            <div>   
                              <img
                                src="../Client/images/User-avatar.svg.png"
                                alt="avatar" class="d-flex align-self-center me-3" width="60">
                              <span class="badge bg-success badge-dot"></span>
                            </div>
                            <div class="pt-1">
                              <p class="fw-bold mb-0"><?=$cus['FullName']?></p>
                              <p class="small text-muted">Hello, Are you there?</p>
                            </div>
                          </div>
                          <div class="pt-1">
                            <p class="small text-muted mb-1">Just now</p>
                            <!-- <span class="badge bg-danger rounded-pill float-end">3</span> -->
                          </div>
                        </a>
                      </li>
                      <?php
                      }
                      ?>
                    </ul>
                  </div>
                  
                </div>

              </div>

              <div class="col-md-6 col-lg-7 col-xl-8">

                <div class="pt-3 pe-3" data-mdb-perfect-scrollbar="true"
                  style="position: relative; height: 400px;  overflow-y: scroll;" id="chatContent" >

                </div>

                <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2" id="inputform" >
                  
                </div>

              </div>
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>
</section>
<script>
    function selectSuporter(CusID){
      localStorage.setItem('IncomingID',CusID);
      loadMsg(CusID);
    }
    function loadMsg(CusID){
        $.ajax({
            url: 'chatapp/getMsg.php',
            method: 'POST',
            data: {
              CusID
            },
            success: function(result) {
              console.log(result);
                document.getElementById("chatContent").innerHTML=(result);
                document.getElementById("inputform").innerHTML=`
                <div class="form-outline" style="width:100%;">
                <form onsubmit="sendMsg('`+CusID+`')" class="row">
                    <input class="form-control col-11" id="msg" ></input>
                    <button style="color:#39c0ed; border:none; background:none;" class="col-1">
                        <i class="fa fa-share" aria-hidden="true" style="font-size:25px; cursor:pointer;"></i>
                    </button>
                </form>
                </div>`;
            },
            error: function(err){
                console.log(err);
            }
        });
    }
    function sendMsg(CusID){
        event.preventDefault();
        let msg = document.getElementById("msg").value;
        let IncomingID=CusID;
        console.log(IncomingID);
        document.getElementById("msg").value="";
        $.ajax({
            url: 'chatapp/sendMsg.php',
            method: 'POST',
            data: {
                msg,
                IncomingID
            },
            success: function(result) {
                console.log(result);
                loadMsg(CusID);
            },
            error: function(err){
                console.log(err);
            }
        });
    }
</script>