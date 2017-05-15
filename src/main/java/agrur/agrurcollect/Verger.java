package agrur.agrurcollect;

public class Verger {


    protected String  id, variete, superficie, localisation, nbArbres;

    public Verger(String variete, String superficie, String localisation, String nbArbres){
        this.variete = variete;
        this.superficie = superficie;
        this.localisation = localisation;
        this.nbArbres = nbArbres;
    }


    public String getId() { return id;}
    public String getVariete() {
        return variete;
    }

    public String getSuperficie() {
        return superficie;
    }

    public String getLocalisation() {
        return localisation;
    }

    public String getNbArbres() {
        return nbArbres;
    }

    public void setId(String id) {this.id = id;}

    public void setVariete(String variete) {
        this.variete = variete;
    }

    public void setSuperficie(String superficie) {
        this.superficie = superficie;
    }

    public void setLocalisation(String localisation) {
        this.localisation = localisation;
    }

    public void setNbArbres(String nbArbres) {
        this.nbArbres = nbArbres;
    }

}
