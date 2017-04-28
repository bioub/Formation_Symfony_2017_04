# TP Symfony

* Créer un nouveau projet SFBlog
* Ouvrir le projet avec PHPStorm
* Créer un faux-domaine dans le fichier hosts
* Créer un nouveau Virtual dans httpd-vhost.conf
* Générer un nouveau Contrôleur Actualite avec 4 routes :
	* list -> /actualites
	* show -> /actualites/5743 (par exemple)
	* add -> /actualites/ajouter (par exemple)
	* listByCategorie -> /actualites/php (par exemple)
* Remplir les fichiers Twig avec du faux texte et faire les liens
* Générer l'entité Actualite
  * titre
  * categorie
  * corps (type text)
  * date
* Générer l'entité Auteur
  * prenom
  * nom
* Lier les Actualités aux Auteurs (afficher le nom de l'autre sur le showAction de Contact)
* Utiliser DoctrineFixtureBundle soit NelmioAliceBundle pour générer des Fixtures
* Développer les actions du Contrôleur
* Remplacer le faux-texte dans les vues

