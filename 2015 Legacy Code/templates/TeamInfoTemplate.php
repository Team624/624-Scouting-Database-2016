<?php

class TeamInfoTemplate extends Template {

  public function __construct() {
    $this->keys[] = 'team';
    $this->keys[] = 'data';
  }
  public function render() {
  $d = $this->data['data'];
  ?>
  <?php
    //Function that returns a CSS class for a td that colors cells based off of successes and failures of something.
    //mostly intended for use when their is potential for one success per cycle.
    function standardColor($success,$fails){
      $shots =$success+$fails;
      if($shots>0){
        if($shots>=5)
          if($fails==0)
            return 'uber-good-cell';
          else if($success>=4 && $success/($success+$fails)>=.75)
            return 'good-cell';
          else if($success>=4)
            return 'minor-good-cell';
          else if($success>=2)
            return 'caution-cell';
          else
            return 'uber-bad-cell';
        else if($shots>2)
          if($fails==0)
            return 'good-cell';
          else if($success>$fails)
            return 'minor-good-cell';
          else if($success==$fails)
            return 'caution-cell';
          else if($success==1)
            return 'bad-cell';
          else if($success==0)
            return 'uber-bad-cell';
          else
            return 'caution-cell';
        else
          if($success==0)
            return 'bad-cell';
          else if($success==2)
            return 'minor-good-cell';
          else
            return 'caution-cell';
        return "normal-cell";
      }
    }
    //Function that returns a CSS class for a td that colors cells based off of a 1-9 rating
    function ratingsColor($rating){
      switch($rating){
        case 1:
          return 'uber-bad-cell';
          break;
        case 2:
          return 'bad-cell';
          break;
        case 3:
          return 'bad-cell';
          break;
        case 4:
          return 'minor-caution-cell';
          break;
        case 5:
          return 'minor-caution-cell';
          break;
        case 6:
          return 'minor-good-cell';
          break;
        case 7:
          return 'good-cell';
          break;
        case 8:
          return 'good-cell';
          break;
        case 9:
          return 'uber-good-cell';
          break;
      }
      return 'normal-cell';
    }
  ?>
  <div class="team-title">
    Team <?=$this->data['team']?> - <?=$d['name']?>
   </div>
  <div> <b><?=$d['matches_played']?></b> matches actually played, <b><?=$d['no_show']?></b> no-shows </div>
    <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/team_pics/' . $d['team_number'] . '.JPG')) { ?>
    <br>
    <a href="<?='/team_pics/' . $d['team_number'] . '.JPG' ?>" target="_blank">Robot Image Pic</a>
    <br>
  <?php }?>
  <br>
  <!--Insert holding stuff here-->
  bars thdsf
  <div class="info-bar-holder">
    <div class="bar-group">
      <div class="info-bar" id="auto-bar">
        <div class="left section">
          <div class="left info-content">
            <div class="info-title">Autonomous</div>
            <div class="row">
              Totes Moved: <b><?=$d['auto_totes_moved']?></b> Totes
            </div>
            <div class="row">
              3 Stack: (<b><?=$d['auto_three_stack_attempt']?></b> Attepts, <b><?=$d['auto_three_stack_score']?></b> Scores)
            </div>
            <div class="row">
              Cans Moved: <b><?=$d['auto_cans_moved']?></b> 
            </div>
            <div class="row">
              Cans Knocked: <b  class = "<?=($d['auto_cans_knocked']>=$d['matches_played']/2)?"bad-number":"normal-number" ?>"><?=$d['auto_cans_knocked']?></b> 
            </div>
            <br>
            <div class="row">
              Step: (<b><?=$d['auto_can_grab_attempt']?></b> Attempts, <b><?=$d['auto_cans_grabed']?></b> grabbed)
            </div>
            <br>
            <div class="row">
              Autozone: <b><?=$d['auto_zone']?></b>
            </div>
          </div>
          <div class="grippy-circles" id="auto-gippies">
            <p>                              </p>
          </div>
        </div>
        <div class="right section">
          <div class="right info-content">
            <div class="table-holder">
              <table class="matchByMatch">
                <thead>
                <th>Matches</th>
                <?php foreach($d['matches'] as $m) { ?>
                  <th><?=$m['match_number']?></th>
                <?php } ?>
                </thead>
                <tr>
                <th class="vertical" >Start Pos.</td>
                <?php foreach($d['matches'] as $m) { 
                  if($m['no_show']>0){ ?>
                  <td class = "bad-cell">Nshow</td>
                  <?php }
                  else if(true) { ?>
                  <td class = "<?=($m['start_location']==4)?"minor-caution-cell":"normal-cell" ?>" ><?=$m['start_location']?></td>
                  <?php } 
                  else { ?>
                  
                  <?php } ?>
                <?php } ?>
                </tr>
                <th class="vertical" >Totes Moved</td>
                <?php foreach($d['matches'] as $m) {  ?>
                  <td class = "normal-cell"><?=$m['auto_totes_moved']?></td>
                  <?php } ?>
                </tr>
                <th class="vertical" >3 Stack</td>
                <?php foreach($d['matches'] as $m) {  
                  if($m['auto_three_stack_attempt']>0){ 
                    if($m['auto_three_stack_score']>0){ ?>
                      <td><div class="icon-checkmark-2"></div></td>
                    <?php }
                    else{?>
                      <td class="bad-cell">X</td>
                    <?php }
                  } 
                  else { ?>
                  <td class = "didNotDo"></td>
                  <?php } ?>
                <?php } ?>
                </tr>
                <th class="vertical" >Cans Knocked</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['auto_cans_knocked']?></td>
                  <?php } ?>
                </tr>
                <th class="vertical" >Attempt Step</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['auto_can_grab_attempt']?></td>
                  <?php } ?>
                </tr>
                <th class="vertical" >Cans Knocked</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['auto_cans_grabed']?></td>
                  <?php } ?>
                </tr>
                <th class="vertical" >Auto Zone</td>
                <?php foreach($d['matches'] as $m) { 
                  if($m['auto_zone']>0){ ?>
                  <td><div class="icon-checkmark-2"></div></td>
                  <?php }
                  else { ?>
                  <td class="didNotDo">X</td>
                  <?php } ?>
                <?php } ?>
                </tr>
              </table>
            </div>
          </div>
        
        </div>
      </div>
    </div>
    <div class="bar-group">
      <div class="info-bar" id="stacksBar">
        <div class="left section">
          <div class="left info-content">
            <div class="info-title">Stacks</div>
            <div class="row">
              Total Totes: <b><?=$d['total_totes_stacked']?></b>
            </div>
            <div class="row">
              Totes (Lvl 6,5,ect): (<b><?=$d['tote_6']?></b>, <b><?=$d['tote_5']?></b> , <b><?=$d['tote_4']?></b>, <b><?=$d['tote_3']?></b>, <b><?=$d['tote_2']?></b>, <b><?=$d['tote_1']?></b>)
            </div>
            <div class="row">
             Total Cans: <b><?=$d['total_cans_stacked']?></b>
            </div>
            <div class="row">
              Cans (TopLvl,6,ect): (<b><?=$d['can_tops']?></b>, <b><?=$d['can_6']?></b> , <b><?=$d['can_5']?></b>, <b><?=$d['can_4']?></b>, <b><?=$d['can_3']?></b>, <b><?=$d['can_2']?></b>)
            </div>
            <div class="row">
              Chute: <b><?=$d['Chute']?></b>
            </div>
            <div class="row">
              Floor: <b><?=$d['Floor']?></b>
            </div>
            <div class="row">
              Both Floor/Chute: <b><?=$d['floor_and_chute']?></b>
            </div>
            <div class="row">
              Stacks Made: <b><?=$d['stacks_made']?></b>
            </div>
            <div class="row">
              Scored Stacks: <b><?=$d['scored_stacks']?></b>
            </div>
          </div>
          <div class="grippy-circles" id="auto-gippies">
            <p>                              </p>
          </div>
        </div>
        <div class="right section">
          <div class="right info-content">
            <div class="table-holder">
              <table class="matchByMatch">
                <thead>
                <th>Matches</th>
                <?php foreach($d['matches'] as $m) { ?>
                  <th><?=$m['match_number']?></th>
                <?php } ?>
                </thead>
                <th class="vertical" >Totes Total</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['total_totes_stacked']?></td>
                  <?php } ?>
                </tr>
                <th class="vertical" >Totes by level</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['tote_6']?>,<?=$m['tote_5']?>,<?=$m['tote_4']?>,<?=$m['tote_3']?>,<?=$m['tote_2']?>,<?=$m['tote_1']?></td>
                  <?php } ?>
                </tr>
                <th class="vertical" >Total Cans</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['total_cans_stacked']?></td>
                  <?php } ?>
                </tr>
                <th class="vertical" >Cans by lvl</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['can_tops']?>,<?=$m['can_6']?>,<?=$m['can_5']?>,<?=$m['can_4']?>,<?=$m['can_3']?>,<?=$m['can_2']?></td>
                  <?php } ?>
                </tr>
                <th class="vertical" >Chute</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['Chute']?></td>
                  <?php } ?>
                </tr>
                <th class="vertical" >Floor</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['Floor']?></td>
                  <?php } ?>
                </tr>
                <th class="vertical" >Both Floor/Chute</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['floor_and_chute']?></td>
                  <?php } ?>
                </tr>
                <th class="vertical" >Stacks Made</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['stacks_made']?></td>
                  <?php } ?>
                </tr>
                <th class="vertical" >Scored Stacks</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['scored_stacks']?></td>
                  <?php } ?>
                </tr>
              </table>
            </div>
          </div>
        
        </div>
      </div>
		<div class="info-bar" id="coopBar">
		  <div class="left section">
        <div class="left info-content">
          <div class="info-title">Coop</div>
          <div class="row">
            Coop-4: <b><?=$d['coop_4']?></b>
            Coop-3: <b><?=$d['coop_3']?></b>
            Coop-2: <b><?=$d['coop_2']?></b>
            Coop-1: <b><?=$d['coop_1']?></b>
          </div>
        </div>
        <div class="grippy-circles" id="auto-gippies">
          <p>                              </p>
        </div>
		  </div>
		  <div class="right section">
        <div class="right info-content">
          <div class="table-holder">
            <table class="matchByMatch">
              <thead>
              <th>Matches</th>
              <?php foreach($d['matches'] as $m) { ?>
                <th><?=$m['match_number']?></th>
              <?php } ?>
              </thead>
              <th class="vertical" >Coop 4,3,2,1</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><b><?=$d['coop_4']?></b>,<b><?=$d['coop_3']?></b>,<b><?=$d['coop_2']?></b>,<b><?=$d['coop_1']?></b></td>
                  <?php } ?>
              </tr>
            </table>
          </div>
        </div>
		  </div>
		</div>
  </div>
  
   <div class="bar-group">
		<div class="info-bar" id="other-stuff-bar">
		  <div class="left section">
        <div class="left info-content">
          <div class="info-title">Other Stuff</div>
           <div class="row">
            Cans from step: <b><?=$d['cans_from_step']?></b> Matches
          </div>
          <div class="row">
            Noodles In Can: <b><?=$d['noodles_in_cans']?></b>
          </div>
          <div class="row">
            Noodles Pushed in <b><?=$d['noodles_pushed']?></b> Matches
          </div>
        </div>
        <div class="grippy-circles" id="auto-gippies">
          <p>                              </p>
        </div>
		  </div>
		  <div class="right section">
			<div class="right info-content">
			  <div class="table-holder">
				<table class="matchByMatch">
				  <thead>
					<th>Matches</th>
					<?php foreach($d['matches'] as $m) { ?>
					  <th><?=$m['match_number']?></th>
					<?php } ?>
				  </thead>
				  <th class="vertical" >cans_from_step</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['cans_from_step']?></td>
                  <?php } ?>
                </tr>
          <th class="vertical" >noodles_in_cans</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['noodles_in_cans']?></td>
                  <?php } ?>
                </tr>
         <th class="vertical" >Tried Noodle Pushing</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['noodles_pushed']?></td>
                  <?php } ?>
                </tr>
				</table>
			  </div>
        </div>
      
		  </div>
		</div>
  </div>
  
  <div class="bar-group">
		<div class="info-bar" id="Tipping Stuff Stuff">
		  <div class="left section">
        <div class="left info-content">
          <div class="info-title">Knocking</div>
          <div class="row">
            Knocked Unscored: <b><?=$d['tipped_unscored']?></b>
          </div>
          <div class="row">
            Knocked Scored: (<b><?=$d['tipped_scored']?></b>
          </div>
          <div class="row">
            Tipped Cans: (<b><?=$d['tele_cans_tipped']?></b>
          </div>
        </div>
        <div class="grippy-circles" id="auto-gippies">
          <p>                              </p>
        </div>
		  </div>
		  <div class="right section">
			<div class="right info-content">
			  <div class="table-holder">
				<table class="matchByMatch">
				  <thead>
					<th>Matches</th>
					<?php foreach($d['matches'] as $m) { ?>
					  <th><?=$m['match_number']?></th>
					<?php } ?>
				  </thead>
				  <th class="vertical" >tipped_unscored</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['tipped_unscored']?></td>
                  <?php } ?>
          </tr>
          <th class="vertical" >tipped_scored</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['tipped_scored']?></td>
                  <?php } ?>
          </tr>
          <th class="vertical" >Cans knocked over</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['tele_cans_tipped']?></td>
                  <?php } ?>
          </tr>
                
				</table>
			  </div>
        </div>
      
		  </div>
		</div>
    <div class="info-bar" id="bad-stuff-bar">
		  <div class="left section">
        <div class="left info-content">
          <div class="info-title">Other Bad Stuff</div>
          <div clas="row">
            Tipped: <b><?=$d['robot_tipped']?></b> of <?=$d['matches_played']?> matches
          </div>
          <div clas="row">
            Mech. Failure: <b><?=$d['mech_fail']?></b> of <?=$d['matches_played']?> matches
          </div>
          <div clas="row">
            Lost Comms: <b><?=$d['lost_comms']?></b> of <?=$d['matches_played']?> matches
          </div>
          <div class="row">
            <b><?=$d['fouls']?></b> fouls 
          </div>
        </div>
        <div class="grippy-circles" id="auto-gippies">
          <p>                              </p>
        </div>
		  </div>
		  <div class="right section">
			<div class="right info-content">
			  <div class="table-holder">
				<table class="matchByMatch">
				  <thead>
					<th>Matches</th>
					<?php foreach($d['matches'] as $m) { ?>
					  <th><?=$m['match_number']?></th>
					<?php } ?>
				  </thead>
				  <th class="vertical" >Tipped</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['robot_tipped']?></td>
                  <?php } ?>
          </tr>
          <th class="vertical" >Mech. Failure</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['mech_fail']?></td>
                  <?php } ?>
          </tr>
          <th class="vertical" >Lost Comms</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['lost_comms']?></td>
                  <?php } ?>
          </tr>
           <th class="vertical" >fouls</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['fouls']?></td>
                  <?php } ?>
          </tr>
				</table>
			  </div>
        </div>
      
		  </div>
		</div>
	</div>
    
  
 
    <?php if(isset($_SESSION['nNAndE']) && $_SESSION['nNAndE']==FALSE){ ?>
    <div class="sec-title"> Notes </div>
    <hr>
     <div class="box">
      <?php foreach($d['notes'] as $note) { ?>
         
          <div class="note box">
          <?php if (isset($note['match_number'])) { ?>
           <span class="note-match box">Q<?= $note['match_number']?>:</span>
          <?php } ?>
          <?= $note['text'] ?></div>
      <?php } ?>
     </div>
   <br>
   <br>
     <div class="sec-title"> Raw Data </div>
      <hr>
     <div class="table-holder">
      <table class="raw-table">
        <tr>
          <?php foreach ($d as $key => $val) { 
            if($key !== 'matches' && $key !== 'name' && $key !=='notes') {
          ?>
            <th><p><?= $key?></p></th>
          <?php }} ?>
        </tr>
        <tr>
          <?php foreach ($d as $key=>$val) {
            if($key !== 'matches' && $key !== 'name' && $key !=='notes') {
           ?>
            <td><div><?= $val===null?'--':$val ?></div></td>
          <?php }} ?>
        </tr>
      </table>
     </div>
     <div> Match Breakdown </div>
     <div class="table-holder">
      <?php foreach($d['matches'] as $m) { ?>
        <div> Match <?=$m['match_number']?></div>
        <table class="raw-table">
          <tr>
            <?php foreach ($m as $key => $val) { 
              if($key !== 'matches') {
            ?>
              <th><p><?= $key?></p></th>
            <?php }} ?>
          </tr>
          <tr>
            <?php foreach ($m as $key=>$val) {
              if($key !== 'matches') {
             ?>
              <td><div <?=$key==='scout_name'?'class="name"':'a'?>><?= $val===null?'--':$val ?></div></td>
            <?php }} ?>
          </tr>
        </table>
      <?php } ?>
     </div>
  </div>
 <?php } ?>
  <?php }
}