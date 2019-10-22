# Generated by Django 2.0.5 on 2018-06-06 12:31

from django.conf import settings
from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        migrations.swappable_dependency(settings.AUTH_USER_MODEL),
        ('accounts', '0003_auto_20180531_1134'),
    ]

    operations = [
        migrations.CreateModel(
            name='ReferralRecord',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('status', models.NullBooleanField(choices=[(None, 'wait'), (True, 'accepted'), (False, 'cancelled')], default=None, verbose_name='status')),
                ('created_at', models.DateTimeField(auto_now_add=True, verbose_name='created at')),
                ('referral', models.OneToOneField(on_delete=django.db.models.deletion.PROTECT, related_name='referral_record', to=settings.AUTH_USER_MODEL, verbose_name='referral')),
                ('user', models.ForeignKey(on_delete=django.db.models.deletion.PROTECT, related_name='referral_records', to=settings.AUTH_USER_MODEL, verbose_name='user')),
            ],
            options={
                'verbose_name': 'referral record',
                'verbose_name_plural': 'referral records',
            },
        ),
    ]