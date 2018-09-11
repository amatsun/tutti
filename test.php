<!DOCTYPE HTML>
<!--
	Striped by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Striped by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Content -->
			<div id="content">
				<div class="inner">

					<!-- Post -->
						<article class="box post post-excerpt">
							<header>
								<!--
									Note: Titles and subtitles will wrap automatically when necessary, so don't worry
									if they get too long. You can also remove the <p> entirely if you don't
									need a subtitle.
								-->
								<h2><a href="#">注文履歴</a></h2>
								<p>A free, fully responsive HTML5 site template by HTML5 UP</p>
							</header>

							<?php
							require('dbconnect.php');
							$recordSet = mysqli_query($db, 'SELECT order_id, customer_id, seat_num,
							                                max(CASE WHEN item_id = 1 THEN quantity ELSE 0 END) AS "coffee",
							                                max(CASE WHEN item_id = 2 THEN quantity ELSE 0 END) AS "tea",
							                                max(CASE WHEN item_id = 3 THEN quantity ELSE 0 END) AS "orange",
							                                max(CASE WHEN item_id = 4 THEN quantity ELSE 0 END) AS "choco",
							                                max(CASE WHEN item_id = 5 THEN quantity ELSE 0 END) AS "apple",
							                                max(CASE WHEN item_id = 6 THEN quantity ELSE 0 END) AS "fruit",
							                                created, modified
							                                FROM history
							                                GROUP BY order_id DESC
							                                ');
							$page = $_REQUEST['page'];
							?>

							<table width="100%">
							  <tr>
							    <th scope="col">注文ID</th>
							    <th scope="col">お客様ID</th>
							    <th scope="col">席番号</th>
							    <th scope="col">コーヒー</th>
							    <th scope="col">紅茶</th>
							    <th scope="col">オレンジジュース</th>
							    <th scope="col">チョコレートケーキ</th>
							    <th scope="col">アップルパイ</th>
							    <th scope="col">フルーツケーキ</th>
							    <th scope="col">注文時間</th>
							    <th scope="col">変更時間</th>
							  </tr>
							<?php

							while ($table = mysqli_fetch_assoc($recordSet)){

							?>
							  <tr>
							    <td><?php print(htmlspecialchars($table['order_id'])); ?></td>
							    <td><?php print(htmlspecialchars($table['customer_id'])); ?></td>
							    <td><?php print(htmlspecialchars($table['seat_num'])); ?></td>
							    <td><?php print(htmlspecialchars($table['coffee'])); ?></td>
							    <td><?php print(htmlspecialchars($table['tea'])); ?></td>
							    <td><?php print(htmlspecialchars($table['orange'])); ?></td>
							    <td><?php print(htmlspecialchars($table['choco'])); ?></td>
							    <td><?php print(htmlspecialchars($table['apple'])); ?></td>
							    <td><?php print(htmlspecialchars($table['fruit'])); ?></td>
							    <td><?php print(htmlspecialchars($table['created'])); ?></td>
							    <td><?php print(htmlspecialchars($table['modified'])); ?></td>
							  </tr>
							<?php

							}
							?>
							</table>
						</article>

					<!-- Pagination -->
						<div class="pagination">
							<!--<a href="#" class="button previous">Previous Page</a>-->
							<div class="pages">
								<a href="#" class="active">1</a>
								<a href="#">2</a>
								<a href="#">3</a>
								<a href="#">4</a>
								<span>&hellip;</span>
								<a href="#">20</a>
							</div>
							<a href="#" class="button next">Next Page</a>
						</div>

				</div>
			</div>

		<!-- Sidebar -->
			<div id="sidebar">

				<!-- Logo -->
					<h1 id="logo"><a href="#">Tutti Management System</a></h1>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li class="current"><a href="#">新規注文</a></li>
							<li><a href="#">注文履歴</a></li>
							<li><a href="#">お客様状況</a></li>
							<li><a href="#">管理画面</a></li>
						</ul>
					</nav>

				<!-- Search -->
					<section class="box search">
						<form method="post" action="#">
							<input type="text" class="text" name="search" placeholder="Search" />
						</form>
					</section>

				<!-- Text -->
					<section class="box text-style1">
						<div class="inner">
							<p>
								<strong>Striped:</strong> A free and fully responsive HTML5 site
								template designed by <a href="http://twitter.com/ajlkn">AJ</a> for <a href="http://html5up.net/">HTML5 UP</a>
							</p>
						</div>
					</section>

				<!-- Recent Posts -->
					<section class="box recent-posts">
						<header>
							<h2>Recent Posts</h2>
						</header>
						<ul>
							<li><a href="#">Lorem ipsum dolor</a></li>
							<li><a href="#">Feugiat nisl aliquam</a></li>
							<li><a href="#">Sed dolore magna</a></li>
							<li><a href="#">Malesuada commodo</a></li>
							<li><a href="#">Ipsum metus nullam</a></li>
						</ul>
					</section>

				<!-- Recent Comments -->
					<section class="box recent-comments">
						<header>
							<h2>Recent Comments</h2>
						</header>
						<ul>
							<li>case on <a href="#">Lorem ipsum dolor</a></li>
							<li>molly on <a href="#">Sed dolore magna</a></li>
							<li>case on <a href="#">Sed dolore magna</a></li>
						</ul>
					</section>

				<!-- Calendar -->
					<section class="box calendar">
						<div class="inner">
							<table>
								<caption>July 2014</caption>
								<thead>
									<tr>
										<th scope="col" title="Monday">M</th>
										<th scope="col" title="Tuesday">T</th>
										<th scope="col" title="Wednesday">W</th>
										<th scope="col" title="Thursday">T</th>
										<th scope="col" title="Friday">F</th>
										<th scope="col" title="Saturday">S</th>
										<th scope="col" title="Sunday">S</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="4" class="pad"><span>&nbsp;</span></td>
										<td><span>1</span></td>
										<td><span>2</span></td>
										<td><span>3</span></td>
									</tr>
									<tr>
										<td><span>4</span></td>
										<td><span>5</span></td>
										<td><a href="#">6</a></td>
										<td><span>7</span></td>
										<td><span>8</span></td>
										<td><span>9</span></td>
										<td><a href="#">10</a></td>
									</tr>
									<tr>
										<td><span>11</span></td>
										<td><span>12</span></td>
										<td><span>13</span></td>
										<td class="today"><a href="#">14</a></td>
										<td><span>15</span></td>
										<td><span>16</span></td>
										<td><span>17</span></td>
									</tr>
									<tr>
										<td><span>18</span></td>
										<td><span>19</span></td>
										<td><span>20</span></td>
										<td><span>21</span></td>
										<td><span>22</span></td>
										<td><a href="#">23</a></td>
										<td><span>24</span></td>
									</tr>
									<tr>
										<td><a href="#">25</a></td>
										<td><span>26</span></td>
										<td><span>27</span></td>
										<td><span>28</span></td>
										<td class="pad" colspan="3"><span>&nbsp;</span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>

				<!-- Copyright -->
					<ul id="copyright">
						<li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
