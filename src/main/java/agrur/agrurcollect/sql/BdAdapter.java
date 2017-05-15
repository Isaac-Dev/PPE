package agrur.agrurcollect.sql;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

import agrur.agrurcollect.Verger;

public class BdAdapter {
    static final int VERSION_BDD = 1;
    private static final String NOM_BDD = "vergers.db";
    static final String TABLE_VERGERS = "table_vergers";
    static final String COL_ID = "_id";
    static final int NUM_COL_ID = 0;
    static final String COL_VARIETE = "VAR";
    static final int NUM_COL_VARIETE = 1;
    static final String COL_SUPERFICIE = "SUP";
    static final int NUM_COL_SUPERFICIE = 2;
    static final String COL_LOCALISATION = "LOC";
    static final int NUM_COL_LOCALISATION = 3;
    static final String COL_ARBRES = "ARB";
    static final int NUM_COL_ARBRES = 4;

    static final String TABLE_USER = "table_user";
    static final String COL_LOGIN = "LOG";
    static final int NUM_COL_LOGIN = 0;
    static final String COL_MDP = "MDP";
    static final int NUM_COL_MDP = 1;

    private CreateBdVerger bdVergers;
    private Context context;
    private SQLiteDatabase db;

    public BdAdapter (Context context) {
        this.context = context;
        bdVergers = new CreateBdVerger(context, NOM_BDD, null, VERSION_BDD);
    }

    public static String getColId() {
        return COL_ID;
    }

    public static String getColVariete() {
        return COL_VARIETE;
    }

    public static String getColSuperficie() {
        return COL_SUPERFICIE;
    }

    public static String getColLocalisation() {
        return COL_LOCALISATION;
    }

    public static String getColArbres() {
        return COL_ARBRES;
    }

    public BdAdapter open (){
        db = bdVergers.getWritableDatabase();
        return this;
    }
    public BdAdapter close (){
        db.close();
        return null;
    }

    public long insererVerger(Verger unVerger){
        ContentValues values = new ContentValues();
        values.put(COL_ID, unVerger.getId());
        values.put(COL_VARIETE, unVerger.getVariete());
        values.put(COL_SUPERFICIE, unVerger.getSuperficie());
        values.put(COL_LOCALISATION, unVerger.getLocalisation());
        values.put(COL_ARBRES, unVerger.getNbArbres());
        return db.insert(TABLE_VERGERS, null, values);
    }
    public long supprimerTousLesVergers(){
        return db.delete(TABLE_VERGERS,null,null);

    }

    private Verger cursorToVerger(Cursor c){
        if (c.getCount() == 0)
            return null;
        c.moveToFirst();
        Verger unVerger = new Verger(/*c.getString(NUM_COL_ID),*/c.getString(NUM_COL_VARIETE), c.getString(NUM_COL_SUPERFICIE), c.getString(NUM_COL_LOCALISATION), c.getString(NUM_COL_ARBRES));
        c.close();
        return unVerger;
    }

    public Cursor getData(){
        return db.rawQuery("SELECT * FROM TABLE_VERGERS", null);
    }
}
