<ul>
	<li><?= 'Adresse : '.$this->e($salle['adresse']).' - '.$this->e($salle['ville']).' '.$this->e($salle['cp']) ?></li>
	<li><?= 'Tarif max : '.$this->e($salle['tarif']).' euros / personne'?></li>
	<li><a href="<?= $this->e($salle['site_web'])?>" target="_blank">Site internet de la salle</a></li>
</ul>