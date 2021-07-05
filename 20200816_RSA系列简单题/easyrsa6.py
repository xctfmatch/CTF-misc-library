import gmpy2,libnum
from Crypto.Util.number import getPrime
from secret import flag

e = 0x10001
p = getPrime(1024)
q = gmpy2.next_prime(p)
n = p * q
print("n =",n)
m = libnum.s2n(flag)
c = pow(m,e,n)
print("c =", c)

# n = 26737417831000820542131903300607349805884383394154602685589253691058592906354935906805134188533804962897170211026684453428204518730064406526279112572388086653330354347467824800159214965211971007509161988095657918569122896402683130342348264873834798355125176339737540844380018932257326719850776549178097196650971801959829891897782953799819540258181186971887122329746532348310216818846497644520553218363336194855498009339838369114649453618101321999347367800581959933596734457081762378746706371599215668686459906553007018812297658015353803626409606707460210905216362646940355737679889912399014237502529373804288304270563
# c = 18343406988553647441155363755415469675162952205929092244387144604220598930987120971635625205531679665588524624774972379282080365368504475385813836796957675346369136362299791881988434459126442243685599469468046961707420163849755187402196540739689823324440860766040276525600017446640429559755587590377841083082073283783044180553080312093936655426279610008234238497453986740658015049273023492032325305925499263982266317509342604959809805578180715819784421086649380350482836529047761222588878122181300629226379468397199620669975860711741390226214613560571952382040172091951384219283820044879575505273602318856695503917257
