<style>
    #chatbtn{
        position: fixed;
        right: 10px;
        bottom: 150px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
        z-index: 10;
        transition: 0.5s;
    }
    #chatbtn img{
        width: 50px;
        height: 50px;
    }
    #chatbtn:hover{
        bottom: 160px;
    }
    #chatbox{
        position: fixed;
        right: 0px;
        bottom: 10px;
        display: none;
        z-index: 9;
    }
    #chatbox .fa-times{
        cursor: pointer;
    }
    #chatContent{
        display: none;
    }
    #chat1 .form-outline .form-control~.form-notch div {
    pointer-events: none;
    border: 1px solid;
    border-color: #eee;
    box-sizing: border-box;
    background: transparent;
    }

    #chat1 .form-outline .form-control~.form-notch .form-notch-leading {
    left: 0;
    top: 0;
    height: 100%;
    border-right: none;
    border-radius: .65rem 0 0 .65rem;
    }

    #chat1 .form-outline .form-control~.form-notch .form-notch-middle {
    flex: 0 0 auto;
    max-width: calc(100% - 1rem);
    height: 100%;
    border-right: none;
    border-left: none;
    }

    #chat1 .form-outline .form-control~.form-notch .form-notch-trailing {
    flex-grow: 1;
    height: 100%;
    border-left: none;
    border-radius: 0 .65rem .65rem 0;
    }

    #chat1 .form-outline .form-control:focus~.form-notch .form-notch-leading {
    border-top: 0.125rem solid #39c0ed;
    border-bottom: 0.125rem solid #39c0ed;
    border-left: 0.125rem solid #39c0ed;
    }

    #chat1 .form-outline .form-control:focus~.form-notch .form-notch-leading,
    #chat1 .form-outline .form-control.active~.form-notch .form-notch-leading {
    border-right: none;
    transition: all 0.2s linear;
    }

    #chat1 .form-outline .form-control:focus~.form-notch .form-notch-middle {
    border-bottom: 0.125rem solid;
    border-color: #39c0ed;
    }

    #chat1 .form-outline .form-control:focus~.form-notch .form-notch-middle,
    #chat1 .form-outline .form-control.active~.form-notch .form-notch-middle {
    border-top: none;
    border-right: none;
    border-left: none;
    transition: all 0.2s linear;
    }

    #chat1 .form-outline .form-control:focus~.form-notch .form-notch-trailing {
    border-top: 0.125rem solid #39c0ed;
    border-bottom: 0.125rem solid #39c0ed;
    border-right: 0.125rem solid #39c0ed;
    }

    #chat1 .form-outline .form-control:focus~.form-notch .form-notch-trailing,
    #chat1 .form-outline .form-control.active~.form-notch .form-notch-trailing {
    border-left: none;
    transition: all 0.2s linear;
    }

    #chat1 .form-outline .form-control:focus~.form-label {
    color: #39c0ed;
    }

    #chat1 .form-outline .form-control~.form-label {
    color: #bfbfbf;
    }
</style>

<div id="chatbtn" onclick="openChat()">
    <img src="images/mac-messages-icon-300x276-removebg-preview.png" alt="">
    
</div>
<div  id="chatbox">
    <div class="row d-flex justify-content-center" style="min-width: 600px; ">
      <div class="col-md-10 col-lg-10 col-xl-10">
        <div class="card" id="chat1" style="border-radius: 15px;">
          <div
            class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0"
            style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <i class="fas fa-angle-left" onclick="back()" style="cursor:pointer;"></i>
            <p class="mb-0 fw-bold">Hỗ trợ trực tuyến</p>
            <i class="fas fa-times" onclick="closeChat()"></i>
          </div>
          <?php
          if(empty($_SESSION['userId'])){
            ?>
            <div class="card-body">
            <div class="d-flex flex-row justify-content-start mb-4">
            <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                <p class="small mb-0">
                    Vui lòng đăng nhập để gọi hỗ trợ hoặc góp ý
                </p>
            </div>
            </div>

            </div>
            <?php
          }else
          {
            require_once('connection.php');
            $permissByFunctionID=$conn->query("SELECT PermissionID FROM permissiondetail WHERE FunctionID=9");
          ?>
          
          <ul class="list-unstyled mb-0" id="suporter">
            <?php
            foreach($permissByFunctionID as $row){
              $perID=$row['PermissionID'];
              $cusByPermissionID=$conn->query("SELECT * FROM customers WHERE PermissionID=$perID");
              foreach($cusByPermissionID as $cuss)
              {
                ?>
                <li class="p-2 border-bottom" onclick="selectSuporter('<?=$cuss['CustomerID']?>')">
                  <a href="#!" class="d-flex justify-content-between">
                    <div class="d-flex flex-row">
                      <img src="./images/img_avatar.png" alt="avatar"
                        class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                      <div class="pt-1 pl-3">
                        <p class="fw-bold mb-0"><?=$cuss['FullName']?></p>
                        <!-- <p class="small text-muted">Lorem ipsum dolor sit.</p> -->
                      </div>
                    </div>
                    <div class="pt-1">
                      <p class="small text-muted mb-1">Sẵn sàng hỗ trợ</p>
                    </div>
                  </a>
                </li>
                <?php
              }
            }
            ?>
          </ul>
              <div class="card-body" style="overflow-y: scroll; max-height: 600px;">
              <div id="chatContent"></div>
              <div class="form-outline" style="display:none;" id="inputt">
                <form onsubmit="sendMsg(localStorage.getItem('IncomingID'))" class="row">
                    <input class="form-control col-11" id="msg"></input>
                    <button style="color:#39c0ed; border:none; background:none;" class="col-1">
                        <i class="fa fa-share" aria-hidden="true" style="font-size:25px; cursor:pointer;"></i>
                    </button>
                </form>
                </div>
              </div>
              <?php
            }
            ?>
            </div>
      </div>
    </div>
</div>
<script>
    function selectSuporter(CusID){
      document.getElementById("suporter").style.display="none";
      document.getElementById("chatContent").style.display="block";
      document.getElementById("inputt").style.display="block";
      localStorage.setItem('IncomingID',CusID);
      loadMsg();
    }
    function back(){
        document.getElementById("suporter").style.display="block";
        document.getElementById("chatContent").style.display="none";
        document.getElementById("inputt").style.display="none";
    }
    function openChat(){
        if(document.getElementById("chatbox").style.display=="block"){
            document.getElementById("chatbox").style.display="none";
        }else document.getElementById("chatbox").style.display="block";
    }
    function closeChat(){
        document.getElementById("chatbox").style.display="none";
    }
    // setInterval(function() {$('.main-chat').load('msglog.php');}, 1000);
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