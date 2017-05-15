package agrur.agrurcollect;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import agrur.agrurcollect.sql.BdAdapter;

public class AddVerger extends Activity{
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_verger);
        Button buttonQuitter = (Button)findViewById(R.id.btt_quit);
        Button buttonAjouter = (Button)findViewById(R.id.btt_add_verger);
        buttonQuitter.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
        buttonAjouter.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View v) {
                ajouterVerger();
            }
        });
    }

    public void ajouterVerger(){
        EditText variete = (EditText)findViewById(R.id.variete);
        EditText superficie = (EditText)findViewById(R.id.superficie);
        EditText localisation = (EditText)findViewById(R.id.localisation);
        EditText nbArbres = (EditText)findViewById(R.id.nb_arbres);

        BdAdapter vergerBdd = new BdAdapter(this);

        Verger unVerger = new Verger(variete.getText().toString(),superficie.getText().toString(),localisation.getText().toString(),nbArbres.getText().toString());
        vergerBdd.open();
        vergerBdd.insererVerger(unVerger);
        //vergerBdd.supprimerTousLesVergers();
        Toast.makeText(getApplicationContext(), "Vergé ajouté", Toast.LENGTH_LONG).show();
        vergerBdd.close();
    }
}