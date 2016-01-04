//submit.js
(function() { 
  function valNum(item) {
    var regex = /^[0-9]+$/;
    return regex.test(item.val());
  }
  function valMatch(item) {
    var data = item.val();
    if(!valNum(item)) return false;
    return (typeof(window.schedule[data]) !== 'undefined');
  }
  function valTeam(data) {
    var team = data.val();
    curMatch = window.schedule[$('#match').val()];
    if(typeof(curMatch) === 'undefined') return false;
    if(curMatch.red_1 == team) return true;
    if(curMatch.red_2 == team) return true;
    if(curMatch.red_3 == team) return true;
    if(curMatch.blue_1 == team) return true;
    if(curMatch.blue_2 == team) return true;
    if(curMatch.blue_3 == team) return true;
    return false;
  }
  function valScout(item) {
    var data = item.val();
    if(!valNum(item)) return false;
    return typeof(window.scouts[data]) !== 'undefined';
  }
  function valTime(item) {
    var data = item.val();
    return valNum(data) && parseFloat(data) > 0 && parseFloat(data) < 150;
  }
  function valSubj(item) {
    var regex = /^[0-9]$/;
    return regex.test(item.val());
  }
  function valLocation(item) {
    var regex = /^[1-8]$/;
    return regex.test(item.val());
  }
  var zeroList = [
    '#cans-moved',
    '#totes-moved',
    '#auto-cans-knocked',
    '#auto-cans-grabbed',
    '#cans-moved',
    '#tote-6',
    '#tote-5',
    '#tote-4',
    '#tote-3',
    '#tote-2',
    '#tote-1',
    '#can-top',
    '#can-6',
    '#can-5',
    '#can-4',
    '#can-3',
    '#can-2',
    '#coop-4',
    '#coop-3',
    '#coop-2',
    '#coop-1',
    '#floor-stacks',
    '#chute-stacks',
    '#fc-stacks',
    '#scored-stacks',
    '#scored-made',
    '#cans-from-step',
    '#noodles-in-can',
    '#noodles-pushed',
    '#tipped-scored',
    '#tipped-unscored',
    '#cans-tipped',
    '#tipped-scored',
    '#tipped-unscored',
    '#tipped-unscored',
    '#tipped-unscored',
    '#fouls',
    '#tech-fouls',
    '#driving'
  ];
  function autoZero() {
    for(var i=0; i<zeroList.length; i++) {
      $(zeroList[i]).each(function(item) {
        if ($(this).val() === '') $(this).val(0);
      });
    }
  }
  
  function validateOneMap(map) {
    var valid = true;
    for(var key in map) {
      if (map.hasOwnProperty(key)) {
        $(key).each(function(q) {
          console.log(key);
          console.log(map[key]);
          var itemValid = map[key]($(this));
          if (!itemValid) {
            valid = false;
            console.log('invalod' + key);
            $(this).addClass('invalid');
          }
        });
      }
    }
    console.log('hey it is validate map thing');
    return valid;
  }
  //add auton too
  var valMap = {
    '#match':valMatch,
    '#team':valTeam,
    '#scout':valScout
  };
  var autonMap = {
    '#auton-start': valLocation,
    '#totes-moved': valNum,
    '#cans-moved': valNum,
    '#auto-cans-knocked': valNum,
    '#auto-cans-grabbed': valNum
  };
  var teleopMap = {
    '#tote-6': valNum,
    '#tote-5': valNum,
    '#tote-4': valNum,
    '#tote-3': valNum,
    '#tote-2': valNum,
    '#tote-1': valNum,
    '#can-top': valNum,
    '#can-6': valNum,
    '#can-5': valNum,
    '#can-4': valNum,
    '#can-3': valNum,
    '#can-2': valNum,
    '#coop-4': valNum,
    '#coop-3': valNum,
    '#coop-2': valNum,
    '#coop-1': valNum,
    '#floor-stacks': valNum,
    '#chute-stacks': valNum,
    '#fc-stacks': valNum,
    '#scored-stacks': valNum,
    '#scored-made': valNum,
    '#cans-from-step': valNum,
    '#noodles-in-can': valNum,
    '#tipped-scored': valNum,
    '#tipped-unscored': valNum,
    '#cans-tipped': valNum,
    '#fouls': valNum,
    '#tech-fouls': valNum,
    '#driving' : valSubj
  };
  /*var normalAutonMap = {
    '#auton-normal-start' : valLocation,
    '#auton-high-hot,#auton-high-cold,#auton-high-miss,#auton-low-hot,#auton-low-cold,#auton-low-miss' : valNum,
  };
  var goalieAutonMap = {
    '#auton-shots-blocked,#auton-shots-not-blocked' : valNum,
    '#auton-goalie-start' : valLocation
  };*/
  function validate() {
   console.log('validate log');
    valid = true;
    if (!validateOneMap(valMap)) valid = false;
    if ($('#no-show').prop('checked')) {
      return valid;
    } /*else if ($('#goalie').prop('checked')) {
      if (!validateOneMap(goalieAutonMap)) valid = false;
      if(!validateOneMap(teleopMap)) valid = false;
    } else if ($('#normal-auton').prop('checked')) {
      if (!validateOneMap(normalAutonMap)) valid = false;
      if(!validateOneMap(teleopMap)) valid = false;
    }*/
    if (!validateOneMap(autonMap)) return false;
    if(!validateOneMap(teleopMap)) return false;
    return valid;
  }
function prepSubmit() {
  $('.invalid').removeClass('invalid');
  autoZero();
  if (!validate()) {
    alertify.error('Invalid Data');
    return;
  }
  var red = false;
  curMatch = window.schedule[$('#match').val()];
  if(typeof(curMatch) === 'undefined')  {
    alertify.error('Match curMatch team finding broke');
  }
  var team = parseInt($('#team').val());
  if(curMatch.red_1 == team || curMatch.red_2 == team || curMatch.red_3 == team) red = true;
  var post = {};
  post.match_number = parseInt($('#match').val());
  post.team_number = team;
  post.scout_id = parseInt($('#scout').val());
  
  post.no_show = $('#no-show').prop('checked')?true:false;
  if(!(post.no_show)) {
    post.start_location = parseInt($('#auton-start').val());
    post.auto_totes_moved = parseInt($('#totes-moved').val());
    post.auto_three_stack_attempt = $('#3stack-attempt').prop('checked')?true:false;
    post.auto_three_stack_score = $('#3stack-score').prop('checked')?true:false;
    post.auto_cans_moved = parseInt($('#cans-moved').val());
    post.auto_cans_knocked = parseInt($('#auto-cans-knocked').val());
    post.auto_can_grab_attempt = $('#cans-grabed-attempt').prop('checked')?true:false;
    post.auto_cans_grabed = parseInt($('#auto-cans-grabbed').val());
    post.auto_zone = $('#auto-zone').prop('checked')?true:false;
    post.tote_6 = parseInt($('#tote-6').val());
    post.tote_5 = parseInt($('#tote-5').val());
    post.tote_4 = parseInt($('#tote-4').val());
    post.tote_3 = parseInt($('#tote-3').val());
    post.tote_2 = parseInt($('#tote-2').val());
    post.tote_1 = parseInt($('#tote-1').val());
    post.Floor = parseInt($('#floor-stacks').val());
    post.Chute = parseInt($('#chute-stacks').val());
    post.floor_and_chute = parseInt($('#fc-stacks').val());
    post.can_tops = parseInt($('#can-top').val());
    post.can_6 = parseInt($('#can-6').val());
    post.can_5 = parseInt($('#can-5').val());
    post.can_4 = parseInt($('#can-4').val());
    post.can_3 = parseInt($('#can-3').val());
    post.can_2 = parseInt($('#can-2').val());
    post.coop_4 = parseInt($('#coop-4').val());
    post.coop_3 = parseInt($('#coop-3').val());
    post.coop_2 = parseInt($('#coop-2').val());
    post.coop_1 = parseInt($('#coop-1').val());
    post.stacks_made = parseInt($('#scored-made').val());
    post.scored_stacks = parseInt($('#scored-stacks').val());
    post.noodles_in_cans = parseInt($('#noodles-in-can').val());
    post.noodles_pushed = $('#noodles-pushed').prop('checked')?true:false;
    post.tipped_unscored = parseInt($('#tipped-unscored').val());
    post.tipped_scored = parseInt($('#tipped-scored').val());
    post.tele_cans_tipped = parseInt($('#cans-tipped').val());
    post.cans_from_step = parseInt($('#cans-tipped').val());
    /*if($('#defense-75').prop('checked')) {
      post.tele_defense_time = 3;
    } else if($('#defense-50').prop('checked')) {
      post.tele_defense_time = 2;
    } else if($('#defense-25').prop('checked')) {
      post.tele_defense_time = 1;
    } else {
      post.tele_defense_time = 0;
    }*/
    post.tipped = $('#tipped').prop('checked')?true:false;
    post.lost_comms = $('#lost-comms').prop('checked')?true:false;
    post.mech_fail = $('#broke-down').prop('checked')?true:false;
    post.fouls = parseInt($('#fouls').val());
    post.tech_fouls = parseInt($('#tech-fouls').val()); //NaN??
    post.dive_rating = parseInt($('#driving').val());
  }
  if($('#entry-notes').val() !== '') {
    post.note = $('#entry-notes').val();
   }
  return post;
} 
  
$(document).ready(function() {
  $('#match').focus();
  $('#submit').click(function() {
    var post = prepSubmit();
    if(!post) return;
    $.post('/?controller=submit&action=submit', JSON.stringify(post), function(dat) {
      alertify.success('Data submitted :)');
      window.setTimeout(function() {
        location.reload(true); 
      }, 1000);
    }).fail(function(dat) {
      alertify.error(dat.responseText);
      console.log(dat.responseText);
    });
  });
  $('#update').click(function() {
    var post = prepSubmit();
    if(!post) return;
    $.post('/?controller=submit&action=update', JSON.stringify(post), function(dat) {
      alertify.success('Data updated :/');
      window.setTimeout(function() {
        location.reload(true); 
      }, 1000);
    }).fail(function(dat) {
      alertify.error(dat.responseText);
      console.log(dat.responseText);
    });
  });
});

})();

//end submit.js