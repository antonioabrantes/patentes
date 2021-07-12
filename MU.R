#Modelos de Utilidade
library(tidyverse)
library(dplyr)                                
library(corrplot) # gráfico de correlação 
library(ggplot2)
library(ggpubr)
setwd("CursoR")

w<-read.csv(file="mu.csv",sep=";")
plot(w$Residentes,w$Inovacao)
w
residentes<-w$Residentes[1:22]
inovacao<-w$Inovacao[1:22]
plot(residentes,inovacao)
data1<-data.frame(residentes,inovacao)
modelo_regressao <- lm(residentes ~ inovacao, data1)
summary(modelo_regressao)
plot(modelo_regressao, which=c(1)) 
ggplot(data = data1, mapping = aes(x = residentes, y = inovacao)) +
  geom_point() +
  geom_smooth(method = "lm", col = "red") +
  stat_regline_equation(aes(label = paste(..eq.label.., ..adj.rr.label.., sep = "*plain(\",\")~~")),
                        label.x = 0, label.y = 0) +
  theme_classic()
cor(residentes, inovacao, method=c("pearson"))^2 

#Global Innovation Index
setwd("Cursor")
library(tidyverse)
library(dplyr)                                
library(corrplot) # gráfico de correlação 
library(ggplot2)
library(ggpubr)
w2020<-read.csv(file="g2020.csv",sep=";")
w2020$Ano=2020

w2019<-read.csv(file="g2019.csv",sep=";")
w2019$Ano=2019

w2018<-read.csv(file="g2018.csv",sep=";")
w2018$Ano=2018
w2018<-select(w2018,Pais,Score,Rank,Income,RankIncome,Region,RankRegion,Ano)

w2017<-read.csv(file="g2017.csv",sep=";")
w2017$Ano=2017
w2017<-select(w2017,Pais,Score,Rank,Income,RankIncome,Region,RankRegion,Ano)

w2016<-read.csv(file="g2016.csv",sep=";")
w2016$Ano=2016
w2016<-select(w2016,Pais,Score,Rank,Income,RankIncome,Region,RankRegion,Ano)

w2015<-read.csv(file="g2015.csv",sep=";")
w2015$Ano=2015
w2015<-select(w2015,Pais,Score,Rank,Income,RankIncome,Region,RankRegion,Ano)

w2014<-read.csv(file="g2014.csv",sep=";")
w2014$Ano=2014
w2014<-select(w2014,Pais,Score,Rank,Income,RankIncome,Region,RankRegion,Ano)

w2013<-read.csv(file="g2013.csv",sep=";")
w2013$Ano=2013
w2013<-select(w2013,Pais,Score,Rank,Income,RankIncome,Region,RankRegion,Ano)

w2012<-read.csv(file="g2012.csv",sep=";")
w2012$Ano=2012
w2012<-select(w2012,Pais,Score,Rank,Income,RankIncome,Region,RankRegion,Ano)

w2011<-read.csv(file="g2011.csv",sep=";")
w2011$Ano=2011
w2011<-select(w2011,Pais,Score,Rank,Income,RankIncome,Region,RankRegion,Ano)


w <- merge(w2020, w2019, all = T)
w <- merge(w, w2018, all = T)
w <- merge(w, w2017, all = T)
w <- merge(w, w2016, all = T)
w <- merge(w, w2015, all = T)
w <- merge(w, w2014, all = T)
w <- merge(w, w2013, all = T)
w <- merge(w, w2012, all = T)
w <- merge(w, w2011, all = T)
#View(w)

dados<-w %>% filter(Pais=='Japan')
dados<-w %>% filter(Pais=='Germany')
dados<-w %>% filter(Pais=='Korea')

dados<-w %>% filter(Pais=='Australia')
dados<-w %>% filter(Pais=='China')

dados<-w %>% filter(Pais=='Brazil')
dados<-w %>% filter(Pais=='Chile')
dados<-w %>% filter(Pais=='Mexico')
dados<-w %>% filter(Pais=='Turkey')
dados<-w %>% filter(Pais=='Portugal')
dados<-w %>% filter(Pais=='Spain')

dados<-w %>% filter(Pais=='Argentine')
dados<-w %>% filter(Pais=='Hungary')
dados<-w %>% filter(Pais=='Philippines')

dados<-w %>% filter(Pais=='Uruguay')
dados<-w %>% filter(Pais=='HongKong')
dados<-w %>% filter(Pais=='CzechRepublic')
dados<-w %>% filter(Pais=='Slovakia')

dados<-w %>% filter(Pais=='Austria')
dados<-w %>% filter(Pais=='Italy')
dados<-w %>% filter(Pais=='Russia')
dados<-w %>% filter(Pais=='Finland')

dados<-w %>% filter(Pais=='France')
dados<-w %>% filter(Pais=='Denmark')
dados<-w %>% filter(Pais=='Greece')
dados<-w %>% filter(Pais=='Malaysia')

dados<-w %>% filter(Pais=='Japan')

dados
dados<-dados[order(dados$Ano),]
dados
dadosGII<-dados

plot(dadosGII$Ano,dados$Score)
ggplot(data = dadosGII, mapping = aes(x = Ano, y = Score)) +
  geom_point() +
  geom_smooth(method = "lm", col = "red") +
  stat_regline_equation(aes(label = paste(..eq.label.., ..adj.rr.label.., sep = "*plain(\",\")~~")),
                        label.x = 2011, label.y = 40) +
  theme_classic()


#Grafico de MU e Residentes
wPIRes<-read.csv(file="wipoPIResident.csv",sep=";")
#View(wPIRes)
dados<-wPIRes %>% filter(Office=='Korea')
dados<-wPIRes %>% filter(Office=='Brazil')
dados<-wPIRes %>% filter(Office=='Germany')
dados<-wPIRes %>% filter(Office=='Japan')
yPI<-as.integer(dados[1,5:44])
xPI<-c(1980:2019)
wPI<-data.frame(xPI,yPI)
wPI
plot(xPI,yPI)
ggplot(data = wPI, mapping = aes(x = xPI, y = yPI)) +
  geom_line(color="red") +
  geom_point(color="brown") +
  geom_smooth(method = "lm", se = T) +
  theme_classic()


wMU<-read.csv(file="wipoMU.csv",sep=";")
#View(wMU)
dadosMU<-wMU %>% filter(Office=='Korea')
dadosMU<-wMU %>% filter(Office=='Brazil')
dadosMU<-wMU %>% filter(Office=='Germany')
dadosMU<-wMU %>% filter(Office=='Japan')
yMU<-as.integer(dadosMU[1,5:44])
xMU<-c(1980:2019)
wMU<-data.frame(xMU,yMU)
wMU
plot(xMU,yMU)
colnames(wMU)<-c("Ano","MU")
ggplot(data = wMU, mapping = aes(x = xMU, y = yMU)) +
  geom_line(color="green") +
  geom_point(color="brown") +
  geom_smooth(method = "lm", se = T) +
  theme_classic()

ggplot(data = wMU, mapping = aes(x = xMU, y = yMU)) +
  geom_line(color="green", show.legend = T, size=2) +
  geom_line(aes(y = yPI), color = "blue", show.legend = T, size=2) + 
  labs(x = "",
       y = "Depósitos de patentes",
       title = "Evolução PI e MU",
       subtitle = "Fonte: WIPO") +
  theme(
    legend.text = element_text(colour = "blue", size = rel(1.5)),
    legend.position = c(.05, .95),
    legend.justification = c("left", "top"),
    legend.box.just = "left",
    legend.margin = margin(6, 6, 6, 6)
  )

yPI
yMU
razao<-yPI/yMU
wRazao<-data.frame(xMU,razao)
wRazao

ggplot(data = wRazao, mapping = aes(x = xMU, y = razao)) +
  geom_line(color="green", show.legend = T, size=1) +
  geom_smooth(method = "lm", se = F) +
  labs(x = "",
       y = "Razão",
       title = "Razão PI/MU",
       subtitle = "Fonte: WIPO")

#correlação PI/MU com Indice Inovação
wRazao
wRazao[2] 
c(wRazao[2])
d<-c(wRazao[2])
y<-d$razao[32:40] # 2011-32, 2019-40
y # dados da razão PI/MU de 2011 a 2019 

dadosGII
dadosGII[2]$Score
i<-c(dadosGII[2]$Score)
x<-i[1:9]
x #dados do Global Innovation Index de 2011 a 2019
plot(x,y)

wCor<-data.frame(x,y)
cor(x, y, method=c("pearson"))^2 
ggplot(data = wCor, mapping = aes(x = x, y = y)) +
  geom_line(color="green", show.legend = T, size=1) +
  geom_smooth(method = "lm", se = F, linetype = "dashed") +
  labs(x = "Global Innovation Index",
       y = "Razão PI/MU",
       title = "Correlação entre PI/MU e Global Innovation Index",
       subtitle = "Fonte: WIPO")

lm_eqn <- function(df){
  m <- lm(y ~ x, df);
  eq <- substitute(italic(y) == a + b %.% italic(x)*","~~italic(r)^2~"="~r2, 
                   list(a = format(unname(coef(m)[1]), digits = 2),
                        b = format(unname(coef(m)[2]), digits = 2),
                        r2 = format(summary(m)$r.squared, digits = 4)))
  eq <- substitute(italic(r)~"="~rvalue*","~italic(p)~"="~pvalue, 
                   list(rvalue = sprintf("%.3f",sqrt(summary(m)$r.squared)), 
                        pvalue = format(summary(m)$coefficients[2,4], digits = 2)))
  as.character(as.expression(eq));
}

wCor
m <- lm(y ~ x, wCor)
sqrt(summary(m)$r.squared)

ggplot(data = wCor, mapping = aes(x = x, y = y)) +
  geom_line(color="green", show.legend = T, size=1) +
  geom_smooth(method = "lm", se = F, linetype = "dashed", formula = y ~ x) +
  geom_text(x = 52, y = 46, label = lm_eqn(wCor), parse = TRUE) +
  labs(x = "Global Innovation Index",
       y = "Razão PI/MU",
       title = "Correlação entre PI/MU e Global Innovation Index (Japão)",
       subtitle = "Fonte: WIPO")

