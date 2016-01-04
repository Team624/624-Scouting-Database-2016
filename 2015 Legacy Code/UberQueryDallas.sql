DROP TEMPORARY TABLE IF EXISTS matches_result;
DROP TEMPORARY TABLE IF EXISTS agg_result;

CREATE TEMPORARY TABLE IF NOT EXISTS matches_result ENGINE = MEMORY(
	SELECT 
	match_data.match_number,
	match_data.team_number,
    scouts.name as 'scout_name',
    start_location,
    auto_totes_moved,
    auto_three_stack_attempt,
    auto_three_stack_score,
    auto_cans_moved,
    auto_cans_knocked,
    auto_can_grab_attempt,
    auto_cans_grabed,
    auto_zone,
    tote_6,
    tote_5,
    tote_4,
    tote_3,
    tote_2,
    tote_1,
    (tote_6 + tote_5 + tote_4 + tote_3 + tote_2 + tote_1) AS 'total_totes_stacked',
    Chute,
    `Floor`,
    floor_and_chute,
    can_tops,
    can_6,
    can_5,
    can_4,
    can_3,
    can_2,
    (can_tops+can_6+can_5+can_4+can_3+can_2) AS 'total_cans_stacked',
    tipped AS 'robot_tipped',
    stacks_made,
    scored_stacks,
    noodles_in_cans,
    noodles_pushed,
    tipped_unscored,
    tipped_scored,
    tele_cans_tipped,
    no_show,
    mech_fail,
    lost_comms,
    fouls,
    tech_fouls,
    coop_4,
    coop_3,
    coop_2,
    coop_1,
    (fouls * 6) as 'foul_points',
    dive_rating as 'Driver_Rating',
    cans_from_step
	FROM match_data
	INNER JOIN scouts ON match_data.scout_id = scouts.id
	WHERE match_data.team_number = :team_number
	GROUP BY match_number
);
SELECT * FROM matches_result;

CREATE TEMPORARY TABLE IF NOT EXISTS agg_result ENGINE = MEMORY ( 
  SELECT
  teams.name AS 'name',
  :team_number AS 'team_number',
  count(matches_result.start_location) AS 'matches_played',
  sum(auto_totes_moved) AS 'auto_totes_moved',
  sum(auto_three_stack_attempt) AS 'auto_three_stack_attempt',
  sum(auto_three_stack_score) AS 'auto_three_stack_score',
  sum(auto_cans_moved) AS 'auto_cans_moved',
  sum(auto_cans_knocked) AS 'auto_cans_knocked',
  sum(auto_can_grab_attempt) AS 'auto_can_grab_attempt',
  sum(auto_cans_grabed) AS 'auto_cans_grabed',
  sum(auto_zone) AS 'auto_zone',
  sum(tote_6) AS 'tote_6',
  sum(tote_5) AS 'tote_5',
  sum(tote_4) AS 'tote_4',
  sum(tote_3) AS 'tote_3',
  sum(tote_2) AS 'tote_2',
  sum(tote_1) AS 'tote_1',
  sum(tote_6 + tote_5 + tote_4 + tote_3 + tote_2 + tote_1) AS 'total_totes_stacked',
  can_tops AS 'can_topsc',
    can_6 AS 'can_6',
    can_5 AS 'can_5',
    can_4 AS 'can_4',
    can_3 AS 'can_3',
    can_2 AS 'can_2',
    (can_tops+can_6+can_5+can_4+can_3+can_2) AS 'total_cans_stacked',
  sum(Chute) as 'Chute',
  sum(`Floor`) as 'Floor',
  sum(floor_and_chute) as 'floor_and_chute',
  sum(can_tops) as 'can_tops',
  ROUND(avg(case when Driver_Rating = 0 then null else Driver_Rating end), 1) as 'driving_rating', -- don't count zeros into these, they mean N/A
  sum(stacks_made) as 'stacks_made',
  sum(scored_stacks) as 'scored_stacks',
  sum(noodles_in_cans) as 'noodles_in_cans',
  sum(noodles_pushed) as 'noodles_pushed',
  sum(tipped_unscored) as 'tipped_unscored',
  sum(tipped_scored) as 'tipped_scored',
  sum(tele_cans_tipped) as 'tele_cans_tipped',
  sum(no_show) as 'no_show',
  sum(mech_fail) as 'mech_fail',
  sum(robot_tipped) as 'robot_tipped',
  sum(lost_comms) as 'lost_comms',
  sum(fouls) as 'fouls',
  sum(coop_4) as 'coop_4',
  sum(coop_3) as 'coop_3',
  sum(coop_2) as 'coop_2',
  sum(coop_1) as 'coop_1',
  cans_from_step as 'cans_from_step'
FROM matches_result
INNER JOIN teams ON teams.number = matches_result.team_number
);

SELECT * FROM agg_result;

SELECT 'Somehow this select statement makes the query not fail... some sort of PDO bug';