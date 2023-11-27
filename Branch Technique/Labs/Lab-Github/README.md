# lab-github <br>
## Tâches à accomplir dans ce laboratoire : Travailler avec les branches

Dans ce laboratoire, l'accent principal est mis sur la tâche de travailler avec les branches dans votre dépôt GitHub. Les branches représentent un concept fondamental dans Git et GitHub, vous permettant d'adresser simultanément différentes parties de votre projet. 

**Étapes pour créer un conflit** <br>

Après avoir collaboré avec quelqu'un d'autre pour travailler sur le même dépôt

***D'abord, vous devez cloner votre dépôt*** <br>

```
git clone https://github.com/aminaassaid1/CNMH.git

```
***Puis vous devez cloner votre dépôt*** <br>

- ensuite, vous pouvez commencer à apporter des modifications aux fichiers selon vos tâches
=> mais parfois, vous pouvez modifier la même ligne que votre collègue de groupe a également modifiée <br>
dans cette situation, lorsque vous essayez de fusionner votre branche avec sa branche, vous obtiendrez un conflit.

***Créez votre branche et poussez***
```
git checkout -b <branch-name>
```
Remplacez <nom-de-la-branche> par le nom souhaité pour votre nouvelle branche. Cette commande crée une nouvelle branche et bascule dessus.<br>
Si vous voulez créer la branche mais rester sur votre branche actuelle, vous pouvez omettre le drapeau -b :

```
git branch <branch-name>
```
**Après avoir créé la branche, vous pouvez y basculer plus tard en utilisant:***

```
git checkout <branch-name>
```
Ou, si vous utilisez Git version 2.23 ou ultérieure, vous pouvez utiliser la commande git switch pour basculer entre les branches :

```
git switch <branch-name>
```

N'oubliez pas de remplacer <nom-de-la-branche> par le nom réel que vous souhaitez donner à votre nouvelle branche..

***Pour fusionner les branches branche-1 et branche-2 dans la branche principale, suivez ces étapes :***<br>

***Assurez-vous d'être sur la branche principale :***<br>
Avant de commencer la fusion, assurez-vous d'être sur la branche principale. Vous pouvez basculer sur la branche principale avec la commande suivante :

```
git checkout main
```

***Tirez les dernières modifications :***<br>

***Il est bon de s'assurer que votre branche principale est à jour avec le dépôt distant avant de fusionner des branches. Vous pouvez le faire avec :***

```
git pull origin main
```
***Fusionnez les branches :***
Pour fusionner la branche-1 dans main, utilisez la commande suivante :

```
git merge barnch-1
```

Ensuite, s'il n'y a pas de conflits, pour fusionner la branche-2 dans main, utilisez :

```
git merge hussein
```
**Résolvez les conflits (le cas échéant) :**<br>
S'il y a des conflits lors du processus de fusion, Git fera une pause et vous permettra de les résoudre. Vous devrez ouvrir les fichiers en conflit, résoudre les conflits

**Suivez ces étapes pour résoudre le conflit** <br>

```
<body>
<<<<<<< HEAD
    Hello im Assaid Amina Web & Mobile developer and solicode intern
=======
    Soufiane ipsum dolor sit amet consectetur adipisicing elit. 
>>>>>>> origin/hussein
    Sed maiores quo debitis harum dolorum, itaque aliquid reiciendis 
    quasi repellendus aliquam alias ipsam eligendi earum voluptate totam! Quos deleniti pariatur nemo?
    ll
    lorem
    MMMM
</body>

```
***Acceptez le changement actuel***<br>
Utilisez-le si vous voulez conserver le changement actuel et ignorer le changement entrant<br>

***Acceptez le changement entrant***<br>
Utilisez-le si vous voulez conserver le changement entrant et ignorer le changement actuel<br>
***Acceptez les deux changements***<br>
Utilisez-le si vous voulez conserver les deux changements<br>
***Comparer les changements***<br>
Utilisez-le si vous voulez comparer les changements et voir ce que vous voulez conserver et ce que vous voulez changer <br>


***Ensuite, mettez en scène les fichiers résolus avec ***<br>

```
git add <conflicted-file-name>
```
Une fois que tous les conflits sont résolus, continuez le processus de fusion avec :

```
git merge --continue
```
***Validez les changements fusionnés :***
Après avoir résolu tous les conflits et vous être assuré que tout est comme vous le souhaitez, validez les changements fusionnés :

```
git commit -m "Merge branch-1 and branch-2 into main"
```
***Poussez les changements vers le distant :***

Enfin, poussez les changements fusionnés vers le dépôt distant :


```
git push origin main
```
Maintenant, les changements des branches branche-1 et branche-2 sont fusionnés dans la branche principale. Assurez-vous de tester minutieusement le code fusionné pour vous assurer que tout fonctionne comme prévu avant de le déployer en production si nécessaire.