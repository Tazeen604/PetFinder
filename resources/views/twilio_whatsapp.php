from twilio.rest import Client

account_sid = 'AC573359f1055a2daa086efdfb06a75d4a'
auth_token = '1d0e8514c0e09f045e5d7f015857c51b'
client = Client(account_sid, auth_token)

message = client.messages.create(
  from_='whatsapp:+14155238886',
  body='Your appointment is coming up on July 21 at 3PM',
  to='whatsapp:+923357077474'
)

print(message.sid)