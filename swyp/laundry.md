
# This is the best explabation i can give.
##### Let's go .

--at: 1
The * HANGER* function helps us to return the pairs and unpairs from the whichever pile we pass into it.
we can just filter from it, (using length condition) to get the paired and unpaired.


We need as many pairs as the wash limit allows.
#process
To get a pairs from a pile, 
--we hang the pile , = pileHanged
--we extract the pairs, by filtering pileHanged for pairs
--we extract the unpaireds, by filtering pileHanged for unpairs


--at 64:
since getting pairs from the clean pile requires no wash, we get as many as we can from it.
we get pairs from above process = cleanPairs
we get unpairs from process = cleanUnpairs


now that we have some pairs in our laundryBag.
We still have unpaired but clean socks right?
if we find its pair among dirty socks (that doesn't have a dirty pair) we only have to wash once right?
--mixing means concating and flattening. 


--at 78
So to find those pairs we have to mix cleanUnPaired & dirtyUnPaired = mixed
we get pairs from *process* = MixedPairs
we get unpairs from *process* = MixedUnpairs
--dirtyunpaired  is the same as dirtyPairUnik && dirtyPaired is thevsame as dirtyPairunikR


--at 93
now that we have more pairs in our laundryBag.
if we mix the new unpairs from mixed to the dirtyPilesPairs.
Wr can wash all pairs we found but noting that we would have to wash twice.



##Now to wash it. 
--at: 144
we map through Clean pairs and add each to the bag 
//considering that no need to wash
//our wash count remains the same

--at 120
we map through MixedPairs and wash each pair once and add to travBag
//since it has 1 dirty sock
//our wash count adds up.
//we continue as long as oir limit isn't exceded.

--at 116
we map throught the last: dirtyPairs and washeachpairtwice and add to TravalBag
//since it has 2 dirty socks.
//our wash count adds up.
//we continue as long as oir limit isn't exceded

Thus we can get all tktalPairs snd its lebgth




