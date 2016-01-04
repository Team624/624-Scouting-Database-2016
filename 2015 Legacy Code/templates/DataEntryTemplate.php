<?php

class DataEntryTemplate extends Template {

  public function __construct() {
    $this->keys[] = 'teams';
    $this->keys[] = 'schedule';
    $this->keys[] = 'scouts';
  }
  public function render() {
  ?>
  <div>
   Data Entry Form
   <script>
   window.teams = JSON.parse('<?=json_encode($this->data['teams'], JSON_HEX_APOS)?>');
   window.schedule = JSON.parse('<?=json_encode($this->data['schedule'], JSON_HEX_APOS)?>');
   window.scouts = JSON.parse('<?=json_encode($this->data['scouts'], JSON_HEX_APOS)?>');
   </script>
  </div>
   <form id="entry-form">
    <div class="form-row">
      <label>Match<input type="text" class="num" id="match"></label>
      <label>Team<input type="text" class="num" id="team"></label>
      <label>Scout ID<input type="text" class="num" id="scout"></label>
            <div id="scout-display">
      </div>
      <table class="schedule-preview">
        <tr>
          <th class="r">Red 1</th>
          <th class="r">Red 2</th>
          <th class="r">Red 3</th>
          <th class="b">Blue 1</th>
          <th class="b">Blue 2</th>
          <th class="b">Blue 3</th>
        </tr>
        <tr>
          <td id="r1p"></td>
          <td id="r2p"></td>
          <td id="r3p"></td>
          <td id="b1p"></td>
          <td id="b2p"></td>
          <td id="b3p"></td>
        </tr>
      </table>
    </div>

    <div class="form-row">
      <label>Start Location<input type="text" class="num" id="auton-start"></label>
      <label>Totes Moved<input type="text" id="totes-moved"></label>
      <label>3 Stack Attempted<input type="checkbox" id="3stack-attempt"></label>
      <label>3 Stack Score<input type="checkbox" id="3stack-score"></label>
      <label>Cans Moved<input type="text" id="cans-moved"></label>
      <label>Cans Knocked<input type="text" id="auto-cans-knocked"></label>
      <label>Attempted Can Grab<input type="checkbox" id="cans-grabed-attempt"></label>
      <label>Cans Grabbed<input type="text" id="auto-cans-grabbed"></label>
      <label>Auto Zone<input type="checkbox" id="auto-zone"></label>
    </div>
    <div class="form-row">
      <label>Totes 6<input type="text" id="tote-6"></label>
      <label>Totes 5<input type="text" id="tote-5"></label>
      <label>Totes 4<input type="text" id="tote-4"></label>
      <label>Totes 3<input type="text" id="tote-3"></label>
      <label>Totes 2<input type="text" id="tote-2"></label>
      <label>Totes 1<input type="text" id="tote-1"></label>
    </div>
    <div class="form-row">
      <label>Cans Top<input type="text" id="can-top"></label>
      <label>Cans 6<input type="text" id="can-6"></label>
      <label>Cans 5<input type="text" id="can-5"></label>
      <label>Cans 4<input type="text" id="can-4"></label>
      <label>Cans 3<input type="text" id="can-3"></label>
      <label>Cans 2<input type="text" id="can-2"></label>
    </div>
    <div class="form-row">
      <label>Co-op 4<input type="text" id="coop-4"></label>
      <label>Co-op 3<input type="text" id="coop-3"></label>
      <label>Co-op 2<input type="text" id="coop-2"></label>
      <label>Co-op 1<input type="text" id="coop-1"></label>
    </div>
    <div class="form-row">
      <label>Floor Stacks<input type="text" id="floor-stacks"></label>
      <label>Chute Stacks<input type="text" id="chute-stacks"></label>
      <label>Floor and Chute Stacks<input type="text" id="fc-stacks"></label>
      <label>Scored Sum<input type="text" id="scored-stacks"></label>
      <label>Total Stacks Made<input type="text" id="scored-made"></label>
    </div>
    <div class="form-row">
      <label>Cans From Step<input type="text" id="cans-from-step"></label>
      <label>Noodles in Cans<input type="text" class="num" id="noodles-in-can"></label>
      <label>Noodles Pushed<input type="checkbox" class="num" id="noodles-pushed"></label>     
    </div>
    <div class="bad-things form-row">
      <label>Tipped Unscored<input type="text" class="num" id="tipped-scored"></label>
      <label>Tipped Scored<input type="text" class="num" id="tipped-unscored"></label>
      <label>Cans Tipped<input type="text" class="num" id="cans-tipped"></label>
      
      <label>No Show<input type="checkbox" id="no-show"></label>
      <label>Tipped<input type="checkbox" id="tipped"></label>
      <label>Lost Comms<input type="checkbox" id="lost-comms"></label>
      <label>Mechanical Failure<input type="checkbox" id="broke-down"></label>
      <label>Fouls<input type="text" class="num" id="fouls"></label>
      <label>Tech Fouls<input type="text" class="num" id="tech-fouls"></label>
    </div>
    <div class="ratings form-row">
      <label>Driving/Maneuverability<input type="text" class="num" id="driving"></label>
    </div>
    Notes:<textarea id="entry-notes"></textarea>
   </form>
   <div>
    <button class="big button" id="submit">Submit</div>
    <br />
    <button class="red button" id="update">Update</div>
   </div>
  <?php }
}