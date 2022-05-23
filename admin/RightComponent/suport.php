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

                  <div data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px;" >
                    <ul class="list-unstyled mb-0" id="UserList">
                      
                    </ul>
                  </div>
                  
                </div>

              </div>

              <div class="col-md-6 col-lg-7 col-xl-8">

                <div class="pt-3 pe-3" data-mdb-perfect-scrollbar="true"
                  style="position: relative; height: 400px;  overflow-y: scroll;" id="chatContent" >

                </div>

                <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2" id="inputform" >
                <div class="form-outline" style="width:100%;">
                <form onsubmit="sendMsg(localStorage.getItem('IncomingID'))" class="row">
                    <input class="form-control col-11" id="msg" ></input>
                    <button style="color:#39c0ed; border:none; background:none;" class="col-1">
                        <i class="fa fa-share" aria-hidden="true" style="font-size:25px; cursor:pointer;"></i>
                    </button>
                </form>
                </div>
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
    setInterval(function loadUser(){
      $.ajax({
            url: 'chatapp/getUserList.php',
            method: 'POST',
            success: function(result) {
              // console.log(result);
              document.getElementById("UserList").innerHTML=(result);
            },
            error: function(err){
                console.log(err);
            }
        });
    } ,1500);
    function selectSuporter(CusID){
      localStorage.setItem('IncomingID',CusID);
      loadMsg();
    }
    setInterval(function loadMsg(){
        CusID=localStorage.getItem('IncomingID');
        $.ajax({
            url: 'chatapp/getMsg.php',
            method: 'POST',
            data: {
              CusID
            },
            success: function(result) {
              console.log(result);
                document.getElementById("chatContent").innerHTML=(result);
            },
            error: function(err){
                console.log(err);
            }
        });
    }, 500);
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