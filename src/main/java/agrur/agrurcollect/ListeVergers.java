package agrur.agrurcollect;

import android.app.Activity;
import android.database.Cursor;
import android.os.Bundle;
import android.support.v4.widget.SimpleCursorAdapter;
import android.view.View.OnClickListener;
import android.view.View;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Toast;

import agrur.agrurcollect.sql.BdAdapter;

public class ListeVergers extends Activity {
    private ListView listViewVergers;
    private BdAdapter vergerBdd;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_liste_vergers);

        listViewVergers = (ListView)findViewById(R.id.viewVerger);
        vergerBdd = new BdAdapter(this);
        vergerBdd.open();

        SimpleCursorAdapter dataAdapter = listerVerger(vergerBdd);

        listViewVergers.setAdapter(dataAdapter);

        vergerBdd.close();
       /*Button buttonQuitter = (Button)findViewById(R.id.buttonQuitterListe);
        buttonQuitter.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });*/
    }

    public SimpleCursorAdapter listerVerger(BdAdapter vergerBdd){

        Cursor c = vergerBdd.getData();

        Toast.makeText(getApplicationContext(), "il y a "+String.valueOf(c.getCount())+" vergers dans la BD", Toast.LENGTH_LONG).show();

        String[] columns = new String[] {BdAdapter.getColId(), BdAdapter.getColVariete(), BdAdapter.getColSuperficie(),BdAdapter.getColLocalisation(), BdAdapter.getColArbres()};

        int[] to = new int[] {R.id.id, R.id.variete, R.id.superficie,R.id.localisation, R.id.nb_arbres };

        return new SimpleCursorAdapter(this, R.layout.activity_liste_vergers,c,columns,to);
    }
}
