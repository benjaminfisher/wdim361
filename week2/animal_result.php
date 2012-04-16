<?php
	$animal = strip_tags(trim($_POST['animals']));
	
	$animal_info = array(
		array(
			'name'			=> 'Tazmanian Devil',
			'description'	=> 'A carnivorous marsupial of the family Dasyuridae, now found in the wild only on the Australian island state of Tasmania. The size of a small dog, it became the largest carnivorous marsupial in the world following the extinction of the thylacine in 1936. It is characterised by its stocky and muscular build, black fur, pungent odour, extremely loud and disturbing screech, keen sense of smell, and ferocity when feeding. The Tasmanian devil\'s large head and neck allow it to generate the strongest bite per unit body mass of any living mammal, and it hunts prey and scavenges carrion as well as eating household products if humans are living nearby. Although it is usually solitary, it sometimes eats with other devils and defecates in a communal location. Unlike most other dasyurids, the devil thermoregulates effectively and is active during the middle of the day without overheating. Despite its rotund appearance, the devil is capable of surprising speed and endurance, and can climb trees and swim across rivers.',
			'image'			=> 'images/tasmanian-devil_736_600x450.jpg',
			'image_source'	=> 'http://animals.nationalgeographic.com/animals/mammals/tasmanian-devil/',
			'image_cite'	=> 'National Geographic'
		),
		array(
			'name' => 'Honey Badger',
			'image'			=> 'images/honeybadger1.jpg',
			'description'	=> 'A species of mustelid native to Africa, Southwest Asia, and the Indian Subcontinent. Despite its name, the honey badger does not closely resemble other badger species, instead it bears more anatomical similarities to weasels. It is classed as Least Concern by the IUCN owing to its extensive range and general environmental adaptations. It is primarily a carnivorous species, and has few natural predators because of its thick skin and ferocious defensive abilities.',
			'image_source'	=> 'http://www.badassoftheweek.com/honeybadger.html',
			'image_cite'	=> 'Badass of the Week',
		),
		array(
			'name' => 'Laughing Hyena',
			'image'			=> 'images/Hyena-14.jpg',
			'description'	=> 'A species of hyena native to Sub-Saharan Africa. It is listed as Least Concern by the IUCN on account of its widespread range and large numbers estimated at 10,000 individuals. The species is however experiencing declines outside of protected areas due to habitat loss and poaching. The species may have originated in Asia, and once ranged throughout Europe for at least one million years until the end of the Late Pleistocene. The spotted hyena is the largest member of the Hyaenidae, and is further physically distinguished from other species by its vaguely bear-like build, its rounded ears, its less prominent mane, its spotted pelt, its more dual purposed dentition, its fewer nipples and the presence of a pseudo-penis in the female. It is the only mammalian species to lack an external vaginal opening.',
			'image_source'	=> 'http://slices-of-life.com/2011/12/05/what-animals-make-great-children%E2%80%99s-book-characters/#.T4ogXKtDxLI',
			'image_cite'	=> 'Slices of Life.com',			
		),
		array(
			'name' => 'Piranha',
			'image'			=> 'images/pyranha.jpg',
			'description'	=> 'A member of family Characidae in order Characiformes, an omnivorous freshwater fish that inhabits South American rivers. In Venezuela, they are called caribes. They are known for their sharp teeth and a voracious appetite for meat.',
			'image_source'	=> 'http://jaco44.over-blog.org/article-6241761.html',
			'image_cite'	=> 'Jaco44 Overblog',			
		),
		array(
			'name' => 'Turkey Buzzard',
			'image'			=> 'images/turkey-vulture.jpg',
			'description'	=> 'A bird found throughout most of the Americas. It is also known in some North American regions as the turkey buzzard (or just buzzard), and in some areas of the Caribbean as the John crow or carrion crow. One of three species in the genus Cathartes, in the family Cathartidae, the Turkey Vulture is the most widespread of the New World vultures, ranging from southern Canada to the southernmost tip of South America. It inhabits a variety of open and semi-open areas, including subtropical forests, shrublands, pastures, and deserts.',
			'image_source'	=> 'http://nathistoc.bio.uci.edu/birds/falconiformes/Cathartes%20aura/Cathartes%20aura.htm',
			'image_cite'	=> 'Natural History of Orange County',
		)
	);
	
    include '_header.php';
	
	$a_name = $animal_info[$animal]["name"];
	$a_desc = $animal_info[$animal]["description"];
	$a_image = $animal_info[$animal]["image"];
	$a_image_source = $animal_info[$animal]["image_source"];
	$a_image_cite = $animal_info[$animal]["image_cite"];
?>

<h2><?php echo $a_name; ?></h2>
<figure>
	<img src="<?php echo $a_image; ?>" width="480px" alt="<?php echo $a_name; ?>" />
	<figcaption><?php echo "Image from: <a href=\"$a_image_source\">$a_image_cite</a>"; ?></figcaption>
</figure>

<p>You picked the gorgeous <?php  echo $a_name; ?>. What a great choice!</p>
<p><?php echo $a_desc; ?> - <cite>Wikipedia</cite></p>

<a href="animals.php">Pick another</a>

<?php include '_footer.html'; ?>