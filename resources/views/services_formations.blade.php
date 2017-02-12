@extends('templates.template_main')

@section('titre')

Formation - Liste des formations

@stop

@section('contenu')

	<div class="banner_formation">
		
	</div>

	<div class = 'societe'>
		<div class = 'container'>
			<h5>Liste des formations</h5>

			<div class = 'row'>

				<div class = 'col-md-6'>
					<img src="{{ asset('img/INCENDIE_1.jpg') }}" alt=" " class="img-responsive img-thumbnail" />

					<br><br>

					<h3>Les modules complémentaires</h3>

					<p><i>Mise en place du permis de feu</i></p>
					<p><i>Sensibilisation sur la mise en œuvre du R.I.A</i></p>
				</div>

				<div class = 'col-md-6'>

					<table  class = 'table table-bordered table-striped mb50'>

						<thead>
							<tr>
								<th>Code</th>
								<th>Libellé</th>
							</tr>
						</thead>

						<tr>
							<td>MFR</td>
							<td>Manipulation des extincteurs sur feux réels.</td>
						</tr>

						<tr>
							<td>MBE</td>
							<td>Manipulation à blanc des extincteurs.</td>
						</tr>

						<tr>
							<td>CAT</td>
							<td>Conduite à tenir face à un départ de feu.</td>
						</tr>

						<tr>
							<td>MFS</td>
							<td>Manipulation des extincteurs sur feux simulés.</td>
						</tr>

						<tr>
							<td>IPO</td>
							<td>Instruction sécurité incendie au poste de travail.</td>
						</tr>

						<tr>
							<td>EPI</td>
							<td>Equipier de première intervention.</td>
						</tr>

						<tr>
							<td>MTE</td>
							<td>Utilisation spécifique pour le tertiaire.</td>
						</tr>

						<tr>
							<td>MCU</td>
							<td>Spécifique pour le personnel hôtelier, restauration, cuisine.</td>
						</tr>

						<tr>
							<td>MEO</td>
							<td>Spécifique aux conducteurs d’engins motorisés.</td>
						</tr>
					</table>
				</div>
			</div>

			<div class = 'row'>

				<div class = 'col-md-6'>

					<table  class = 'table table-bordered table-striped mb50 mt50'>

						<thead>
							<tr>
								<th>Code</th>
								<th>Libellé</th>
							</tr>
						</thead>

						<tr>
							<td>RPH</td>
							<td>Rôle du personnel hospitalier face à un départ de feu.</td>
						</tr>

						<tr>
							<td>POE</td>
							<td>Préparer, organiser, évacuer.</td>
						</tr>

						<tr>
							<td>EPL</td>
							<td>Exploitation du SSI, interprétation du langage.</td>
						</tr>

						<tr>
							<td>GSF</td>
							<td>Les guides et serre file.</td>
						</tr>

						<tr>
							<td>MCU</td>
							<td>Préparation à l’évacuation.</td>
						</tr>

						<tr>
							<td>EVA</td>
							<td>Exercice d’évacuation.</td>
						</tr>

						<tr>
							<td>MOS</td>
							<td>Manœuvre de mise en sécurité des résidents.</td>
						</tr>

						<tr>
							<td>GSF</td>
							<td>Les chargés d’évacuation.</td>
						</tr>
					</table>
				</div>

				<div class = 'col-md-6 mt50'>
					<img src="{{ asset('img/evacuation_2.jpg') }}" alt=" " class="img-responsive img-thumbnail" />

					<br><br>

					<h3 class="text-right">Les modules complémentaires</h3>

					<p class="text-right"><i>Les espaces d’attente sécurisé</i></p>
					<p class="text-right"><i>Les mesures de confinement Les modules</i></p>
				</div>
			</div>

			<div class = 'row'>

				<div class = 'col-md-6 mt50'>
					<img src="{{ asset('img/slideshow_accueil/SECOURISME.jpg') }}" alt=" " class="img-responsive img-thumbnail" />
				</div>

				<div class = 'col-md-6'>

					<table  class = 'table table-bordered table-striped mb50 mt50'>

						<thead>
							<tr>
								<th>Code</th>
								<th>Libellé</th>
							</tr>
						</thead>

						<tr>
							<td>DSST</td>
							<td>Devenir sauveteur secouriste du travail.</td>
						</tr>

						<tr>
							<td>MAC</td>
							<td>Recyclage des secouristes du travail.</td>
						</tr>

						<tr>
							<td>MAC</td>
							<td>Recyclage spécifique au sanitaire, social, médico-social.</td>
						</tr>

						<tr>
							<td>IGP</td>
							<td>Initiation aux gestes de premiers secours.</td>
						</tr>

						<tr>
							<td>DAE</td>
							<td>Mise en œuvre du défibrillateur.</td>
						</tr>

						<tr>
							<td>FPS</td>
							<td>Formation secourisme 1 journée.</td>
						</tr>

						<tr>
							<td>FPS</td>
							<td>Formation secourisme 2 jours.</td>
						</tr>

						<tr>
							<td>GPM</td>
							<td>Gestes de premiers secours, programme sur mesure.</td>
						</tr>
					</table>
				</div>
			</div>

			<div class = 'row'>

				<div class = 'col-md-6'>

					<table class = 'table table-bordered table-striped mb50 mt50'>

						<thead>
							<tr>
								<th>Code</th>
								<th>Libellé</th>
							</tr>
						</thead>

						<tr>
							<td>GP</td>
							<td>Gestes et postures.</td>
						</tr>

						<tr>
							<td>PRA</td>
							<td>Prévention des risques liés à l’activité physique.</td>
						</tr>

						<tr>
							<td>PMT</td>
							<td>Postures en milieu tertiaire.</td>
						</tr>

						<tr>
							<td>MAP</td>
							<td>Manutention des personnes.</td>
						</tr>

						<tr>
							<td>GMS</td>
							<td>Gestes et posture, sanitaire, social, médico-social.</td>
						</tr>

						<tr>
							<td>GPM</td>
							<td>Gestes et postures, programme sur mesure selon le cahier

des charges.</td>
						</tr>

						<tr>
							<td>SRPU</td>
							<td>Sensibilisation aux risques professionnels pour les usagers.</td>
						</tr>

						<tr>
							<td>SRHU</td>
							<td>Sensibilisation aux risques à l'hygiène pour les usagers.</td>
						</tr>

						<tr>
							<td>PMT</td>
							<td>Prévention des risques de mon poste de travail.</td>
						</tr>

						<tr>
							<td>MAP</td>
							<td>Risques professionnels du sanitaire, social du médico-social.</td>
						</tr>

					</table>
				</div>

				<div class = 'col-md-6 mt50'>
					<img src="{{ asset('img/127066619.jpg') }}" alt=" " class="img-responsive img-thumbnail" />
				</div>
			</div>
				
		</div>
	</div>

@stop