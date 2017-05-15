package agrur.agrurcollect.sql;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class CreateBdVerger extends SQLiteOpenHelper{
    private static final String TABLE_VERGERS = "table_vergers";
    static final String COL_ID = "_id";
    private static final String COL_VARIETE = "VAR";
    private static final String COL_SUPERFICIE = "SUP";
    private static final String COL_LOCALISATION = "LOC";
    private static final String COL_ARBRES = "ARB";

    private static final String CREATE_BDD = "CREATE TABLE " + TABLE_VERGERS +
        "(" + COL_ID + " TEXT PRIMARY KEY AUTOINCREMENT, " + COL_VARIETE + " TEXT NOT NULL, " + COL_SUPERFICIE + " TEXT NOT NULL, "+ COL_LOCALISATION + " TEXT NOT NULL," + COL_ARBRES + " TEXT NOT NULL);";

    public CreateBdVerger(Context context, String name, SQLiteDatabase.CursorFactory factory, int version) {
        super(context, name, factory, version);
    }



    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(CREATE_BDD);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL("DROP TABLE " + TABLE_VERGERS + ";");
        onCreate(db);
    }
}
