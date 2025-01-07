<?php 

echo '
<form class="row g-3 mt-5 justify-content-md-center" method="post" action="ServerActions/AddRec.php">
          <div class="col-md-3">
            <label for="inputAmt" class="form-label">Enter the Amount</label>
            <input type="text" name="MoneySpent" class="form-control" id="inputAmt" autocomplete="off" />
          </div>

          <div class="col-md-3">
            <label for="inputState" class="form-label">Day</label>
            <select name="Day" id="inputState" class="form-select">
              <option>Choose..</option>
              <option value="Monday">Monday</option>
              <option value="Tuesday">Tuesday</option>
              <option value="Wednesday">Wednesday</option>
              <option value="Thursday">Thursday</option>
              <option value="Friday">Friday</option>
              <option value="Saturday">Saturday</option>
              <option value="Sunday">Sunday</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="date" class="form-label">Date</label>
            <input id="date" type="Date" name="Date" class="form-control"/>
          </div>
          <div class="col-md-9">
            <label for="exampleFormControlTextarea1" class="form-label">It was spent on?</label>
            <textarea class="form-control" name="SpentOn" id="exampleFormControlTextarea1" rows="6" style="resize: none;"></textarea>
          </div>
          <div class="col-md-9">
            <div class="d-flex justify-content-between">
            <a href="ServerActions/SignOut.php"><button type="button" class="btn btn-primary" style="width:35rem;">Sign Out</button></a>
            <button type="submit" class="btn btn-primary" style="width:35rem;">Submit</button>
            </div>
          </div>
        </form>';

?>