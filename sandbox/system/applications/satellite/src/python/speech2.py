import speech_recognition as sr
import webbrowser as wb
def fn_speech_recognition():
    sr.Microphone(device_index = 0)
    print(f"MICs Found on this Computer: \n {sr.Microphone.list_microphone_names()}")
    # Creating a recognition object
    r = sr.Recognizer()
    r.energy_threshold=4000
    r.dynamic_energy_threshold = False

    with sr.Microphone() as source:
        print('Please Speak Loud and Clear:')
        #reduce noise
        r.adjust_for_ambient_noise(source)
        #take voice input from the microphone
        audio = r.listen(source)
        try:
            phrase = r.recognize_google(audio)
            print(f"Did you just say: {phrase} ?")
            url = "https://www.google.com/search?q="
            search_url  = url+phrase
            wb.open(search_url)
        except TimeoutException as msg:
            print(msg)
        except WaitTimeoutError:
            print("listening timed out while waiting for phrase to start")
            quit()
        # speech is unintelligible
        except LookupError:
            print("Could not understand what you've requested.")
        else:
            print("Your results will appear in the default browser. Good bye for now...")


fn_speech_recognition()