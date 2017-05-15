package agrur.agrurcollect;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class Homepage extends Activity {
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.activity_homepage);
        // Boutton d'acces à l'ajout de verger
        Button bttAddVerger = (Button) findViewById(R.id.btt_add_verger);

        // Boutton d'acces à la liste des vergers
        Button bttShowVergers = (Button) findViewById(R.id.btt_showVergers);

        bttAddVerger.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent("agrur.agrurcollect.AddVerger");
                startActivity(Intent.createChooser(intent, "dialogTitle"));
            }
        });
        bttShowVergers.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent ("agrur.agrurcollect.ListeVergers");
                startActivity(i);
            }
        });
    }
}