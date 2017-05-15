package agrur.agrurcollect;

import android.content.ContentResolver;
import android.content.Context;
import android.content.SharedPreferences;
import android.database.CharArrayBuffer;
import android.database.ContentObserver;
import android.database.Cursor;
import android.database.DataSetObserver;
import android.net.Uri;
import android.os.Bundle;

import org.junit.Before;
import org.junit.Test;
import org.mockito.Mock;
import org.mockito.*;

import agrur.agrurcollect.sql.BdAdapter;

import static org.junit.Assert.*;
import static org.mockito.Matchers.anyInt;
import static org.mockito.Matchers.anyString;
import static org.mockito.Mockito.doReturn;


public class AddVergerTest {

    @Mock BdAdapter adapter;
    @Mock Context context;
    @Mock SharedPreferences sharedPreferences;
    @Mock SharedPreferences.Editor editor;

    @Before
    public void setUp() throws Exception {
        MockitoAnnotations.initMocks(this); //créé tous les @Mock

        //on remplace le context.getSharedPreferences(String,int) afin qu'il retourne notre mock sharedPreferences
        doReturn(sharedPreferences).when(context).getSharedPreferences(anyString(), anyInt());

        //on remplace le sharedPreferences.edit() afin qu'il retourne notre mock edit
        doReturn(editor).when(sharedPreferences).edit();

        //on remplace la fonction edit.putString(String, String) afin qu'elle retourne edit,
        //afin d'éviter le crash au edit.putString(S,S).apply()
        doReturn(editor).when(editor).putString(anyString(), anyString());

        adapter = new BdAdapter(null);

    }

    @Test
    public void testAjouterVerger() throws Exception {
        String variete = "Mayette";
        String superficie = "50.0";
        String localisation = "Paris";
        String nbArbres = "33";

        Verger verger = new Verger(variete, superficie, localisation, nbArbres);
        adapter.open();
        adapter.insererVerger(verger);
        Cursor c = adapter.getData();
        assertEquals(variete + superficie + localisation + nbArbres, c.getString(0)+c.getString(0)+c.getString(0)+c.getString(0));
        adapter.close();
    }

}